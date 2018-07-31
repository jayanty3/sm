
<!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "price";?></h3>
              <div id="infoMessage"><h2 class="text-primary"></h2></div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php $price= Fee::find('all'); ?>
        <table class="table table-responsive table-bordered table-striped text-center">
          <tr>
           
            <th>Techer Fee</th>
            <th>Institute fee Monthly</th>
            <th>Institute fee Yearly </th>
          </tr>
          <?php foreach ($price as $p):?>
          <tr>
            
            <td>$<?=  $p->teachers_price;?></td>
            <td>$<?=  $p->monthly_price;?></td>
            <td>$<?=  $p->yearly_price;?></td>
          </tr>

          <tr>
            
            <td>
            
                <?= form_open('backend/price/teacher_price/'.$p->fee_id,array('class'=>'form-horizontal') );?>
              <fieldset>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <input type="text" class="form-control" id="inputEmail" name="teachers_price" placeholder="price">
                    </div>
                  </div>
                  <?php echo form_error('teachers_price', '<p class="text-danger">', '</p>'); ?>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </fieldset>
            </form>
</td>
                  <td>

    <?= form_open('backend/price/center_m/'.$p->fee_id,array('class'=>'form-horizontal') );?>


        <fieldset>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <input type="text" class="form-control" id="inputEmail" name="monthly_price" placeholder="price">
              </div>
            </div>
           <?php echo form_error('monthly_price', '<p class="text-danger">', '</p>'); ?>

          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </fieldset>
      </form>
      </td>
            <td>

    <?= form_open('backend/price/center_y/'.$p->fee_id,array('class'=>'form-horizontal') );?>
            <fieldset>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <input type="text" class="form-control" id="inputEmail" name="yearly_price" placeholder="price">
                  </div>
                </div>
                           <?php echo form_error('yearly_price', '<p class="text-danger">', '</p>'); ?>

              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </fieldset>
          </form>

</td>
          </tr>
          
        <?php endforeach;?>
        
        </table>

              <div class="table-responsive">


</div>
</div>



            
              </div>
            </div>
            
          </div>
          