<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Facebook PHP SDK for CodeIgniter - Redirect login example</title>

    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: Helvetica, Sans-serif;
            font-size: 16px;
            color: #333;
            line-height: 1.5;
        }

        .wrapper {
            width: 800px;
            margin: 60px auto;
            border: 1px solid #eee;
            background: #fcfcfc;
            padding: 0 20px 20px;
            box-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        h1, h3 {
            text-align: center;
        }

        .login {
            text-align: center;
        }

        a {
            border: none;
            background: #2F5B85;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            margin: 20px auto;
            cursor: pointer;

            transition: background .6s ease;
        }

        a:hover {
            background: #999;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <h1>Facebook PHP SDK for CodeIgniter</h1>
    <h3>Redirect login example</h3>

    <p>
        Simple example how you can use the Facebook PHP SDK for CodeIgniter and the Web Redirect login method.
    </p>

    <p>
        <strong>
            For this example to work, make sure you have set 'facebook_login_type' as 'web' and specified login and logout redirect links in the config file.
        </strong>
    </p>

    <p>
        This example code do 3 things
        <ol>
            <li>Check if a user is logged in on page load.</li>
            <li>If user are logged in, displayes some basic information about the user and a logout button.</li>
            <li>If user is not logged in, display login button.</li>
        </ol>
    </p>

    <?php if ( ! $this->facebook->is_authenticated()) : ?>

        <div class="login">
            <a href="<?php echo $this->facebook->login_url(); ?>">Login</a>
        </div>

    <?php else : ?>

        <div class="user-info">

            <p><strong>User information</strong></p>

            <ul>
                <?php foreach ($user as $key => $value) : ?>

                    <li><?php echo $key; ?> : <?php echo $value; ?></li>

                <?php endforeach; ?>
            </ul>

            <p>
                <a href="<?php echo $this->facebook->logout_url(); ?>">Logout</a>
            </p>

        </div>

		<div class="upload-form">
			<?php if ($this->input->post('imageFile')) {
				$response = $this->facebook->user_upload_request(
					$this->input->post('imageFile'),
					['message' => 'This is a test']
				);

				var_dump($response);
			} ?>

			<form method="POST">
				<input type="text" name="imageFile" value="<?php echo APPPATH; ?>MM8354_GrandCanyon.jpg"/>
				<input type="submit" name="upload" value="Upload"/>
			</form>
		</div>

    <?php endif; ?>

</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='<?php echo base_url();?>vendor/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='<?php echo base_url();?>vendor/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url();?>vendor/fullcalendar/lib/moment.min.js'></script>
<script src='<?php echo base_url();?>vendor/fullcalendar/lib/jquery.min.js'></script>
<script src='<?php echo base_url();?>vendor/fullcalendar/fullcalendar.min.js'></script>
<script src='<?php echo base_url();?>vendor/fullcalendar/locale-all.js'></script>
<script src='<?php echo base_url();?>vendor/fullcalendar/gcal.min.js'></script>

<?php  $cal = calendar::find('all');
   
   // echo $cal->start->format('Y-m-d H:i:s');
     
   //   echo "<pre>";
   //   print_r($cal->start);
   //   exit;

?>

<!-- <script>

    $(document).ready(function() {
                var initialLocaleCode = 'en';
                

                
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek'
            },
            defaultDate: new Date(),
            defaultView: 'agendaWeek',
            locale: initialLocaleCode,
            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: 
              
            [   
             <?php foreach ($cal as $c):?>

                           
                {
                    
                    title: '<?= $c->decription;?>',
                    start: '<?=  $c->start->format('Y-m-d H:i:s')?>',
                    end: '<?=  $c->end->format('Y-m-d H:i:s')?>',
                    color: '#8A2BE2',
                },
                    
            <?php endforeach; ?>
            ]
        });
        
    });

</script> -->
<style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>
</head>
<body>

    <div id='calendar'></div>

</body>
</html>
