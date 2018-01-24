                        <p>Ustawienia podstawowe</p>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nazwa</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $task->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <select id="status" type="" class="form-control" name="status">
                                    <option  value="0" <?php if($task->status == 0){echo " selected='selected' ";} ?>>Nieaktywne</option>
                                    <option  value="1" <?php if($task->status == 1){echo " selected='selected' ";} ?>>Aktywne</option>                                    
                                </select>  
                            </div>
                        </div>   

                        <div class="form-group{{ $errors->has('datasource_id') ? ' has-error' : '' }}">
                            <label for="datasource_id" class="col-md-4 control-label">Baza danych</label>
                            <div class="col-md-6">
                                <select id="datasource_id" type="" class="form-control" name="datasource_id">
                                    @foreach ($datasources as $datasource)
                                        <option value="{{$datasource->id}}" <?php if($datasource->code == $task->datasource->code){echo " selected='selected' ";} ?>>{{$datasource->name}}</option> 
                                    @endforeach
                                </select>  
                            </div>
                        </div>  


                        <hr/>
                        <p>Harmonogram</p>


                        <div class="form-group{{ $errors->has('schedule') ? ' has-error' : '' }}">
                            <label for="schedule" class="col-md-4 control-label">Tryb</label>
                            <div class="col-md-6">
                                <select id="schedule"  class="form-control" name="schedule">
                                    <option  value="*"   <?php if($task->schedule == "*"){echo " selected='selected' ";} ?>>Codziennie</option>                                    
                                    <option  value="l"   <?php if($task->schedule == "l"){echo " selected='selected' ";} ?>>Dzień tygodnia</option>
                                    <option  value="d"   <?php if($task->schedule == "d"){echo " selected='selected' ";} ?>>Dzień miesiąca</option> 
                                    <option  value="d-m" <?php if($task->schedule == "d-m"){echo " selected='selected' ";} ?>>Dzień roku</option>                                      
                                </select>  
                            </div>
                        </div>


                        <div class="l form-group{{ $errors->has('day_name_selector') ? ' has-error' : '' }}">
                            <label for="day_name_selector" class="col-md-4 control-label">Dzień</label>
                            <div class="col-md-6">
                                <select id="day_name_selector"  class="form-control" name="day_name_selector">
                                    <option value="Monday"    <?php if($task->date == "Monday"){echo " selected='selected' ";} ?>>Poniedziałek</option>                                    
                                    <option value="Tuesday"   <?php if($task->date == "Tuesday"){echo " selected='selected' ";} ?>>Wtorek</option>
                                    <option value="Wednesday" <?php if($task->date == "Wednesday"){echo " selected='selected' ";} ?>>Środa</option> 
                                    <option value="Thursday"  <?php if($task->date == "Thursday"){echo " selected='selected' ";} ?>>Czwartek</option>   
                                    <option value="Friday"    <?php if($task->date == "Friday"){echo " selected='selected' ";} ?>>Piątek</option>                                    
                                    <option value="Saturday"  <?php if($task->date == "Saturday"){echo " selected='selected' ";} ?>>Sobota</option>
                                    <option value="Sunday"    <?php if($task->date == "Sunday"){echo " selected='selected' ";} ?>>Niedziela</option> 
                                </select>  
                            </div>
                        </div> 



                        <div class="d d-m form-group{{ $errors->has('day_number_selector') ? ' has-error' : '' }}">
                            <label for="day_number_selector" class="col-md-4 control-label">Dzień</label>
                            <div class="col-md-6">
                                <select id="day_number_selector"  class="form-control" name="day_number_selector">
                                    <?php
                                    for($x = 1; $x <= 31; $x++){
                                        $selected = null;
                                        if($x == $task->date){
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
                                    }
                                    ?>                                    
                                </select>  
                            </div>
                        </div> 

                        <div class="d-m form-group{{ $errors->has('year_selector') ? ' has-error' : '' }}">
                            <label for="year_selector" class="col-md-4 control-label">Miesiąc</label>
                            <div class="col-md-6">
                                <select id="year_selector"  class="form-control" name="year_selector">
                                    <?php 
                                    if($task->schedule == 'd-m'){
                                        $day = explode('-', $task->date);
                                    } else {
                                        $day[1] = 1;
                                    }
                                    ?>
                                    <option value="1" <?php if($day[1] == "1"){echo " selected='selected' ";} ?>>Styczeń</option>  
                                    <option value="2" <?php if($day[1] == "2"){echo " selected='selected' ";} ?>>Luty</option> 
                                    <option value="3" <?php if($day[1] == "3"){echo " selected='selected' ";} ?>>Marzec</option> 
                                    <option value="4" <?php if($day[1] == "4"){echo " selected='selected' ";} ?>>Kwiecień</option> 
                                    <option value="5" <?php if($day[1] == "5"){echo " selected='selected' ";} ?>>Maj</option> 
                                    <option value="6" <?php if($day[1] == "6"){echo " selected='selected' ";} ?>>Czerwiec</option> 
                                    <option value="7" <?php if($day[1] == "7"){echo " selected='selected' ";} ?>>Lipiec</option> 
                                    <option value="8" <?php if($day[1] == "8"){echo " selected='selected' ";} ?>>Sierpień</option> 
                                    <option value="9" <?php if($day[1] == "9"){echo " selected='selected' ";} ?>>Wrzesień</option> 
                                    <option value="10" <?php if($day[1] == "10"){echo " selected='selected' ";} ?>>Październik</option> 
                                    <option value="11" <?php if($day[1] == "11"){echo " selected='selected' ";} ?>>Listopad</option> 
                                    <option value="12" <?php if($day[1] == "12"){echo " selected='selected' ";} ?>>Grudzień</option>                                     
                                </select>  
                            </div>
                        </div> 

                        <input id="date" type="text" class="form-control" name="date" value="{{$task->date}}" style="display:none"  />


                        <?php if(json_decode($task->params)) { ?>
                        <hr/>
                        <p>Parametry</p>
                       
                            <?php foreach(json_decode($task->params) as $key => $value) { ?>    
                            <div class="form-group">
                                <label for="params[]" class="col-md-4 control-label"><?php echo $key ?></label>
                                <div class="col-md-6">
                                    <input   type="text" class="form-control" name="params[<?php echo $key ?>]" value="<?php echo $value ?>">
                                </div>
                            </div>
                            <?php } ?>    
                        <?php } ?>

                        
                        <hr/>
                        <p>Wiadomość</p>                        
                        
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Treść</label>
                            <div class="col-md-6">
                                <textarea id="message" name="message" class="form-control" style="min-height:200px">{{ $task->message }}</textarea> 
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                          
                        
 
                        <hr/>
                        <p>Zapytanie SQL</p>                        
                        
                        <div class="form-group{{ $errors->has('sql') ? ' has-error' : '' }}">
                            <label for="sql" class="col-md-4 control-label">SQL</label>
                            <div class="col-md-6">
                                <textarea readonly id="sql" name="sql" class="form-control" style="min-height:200px"><?php echo $task->sql ?></textarea>
                            </div>
                        </div>                           
                        
                        
<script type="text/javascript">
$(function() {

    var tryb;    
    orderInputs('<?php echo $task->schedule; ?>');
    $('#date').val('<?php echo $task->date; ?>');

    $('#schedule').on('change', function (e) {
        orderInputs(this.value);
    });

    $('#day_name_selector').on('change', function (e) {
        $('#date').val(this.value);
    });

    $('#day_number_selector').on('change', function (e) {
        if(tryb == 'd-m'){
            $('#date').val(this.value+'-'+$('#year_selector').val());
        } else {
            $('#date').val(this.value);
        }
    });
    
    $('#year_selector').on('change', function (e) {
        $('#date').val($('#day_number_selector').val()+'-'+this.value);
    });    

 

    function orderInputs(value)
    {
        tryb = value;
        console.log(tryb);
        $('.l').hide();  
        $('.d').hide(); 
        $('.d-m').hide();
        
        if(tryb == 'd-m'){
           $('#date').val($('#day_number_selector option:first').val()+'-'+$('#year_selector option:first').val()); 
        } else {
            if(tryb == '*'){
                $('#date').val('*'); 
            } else {
                $('#date').val($('.'+value+' option:first').val()); 
            }
           
        }
        if(value != '*'){
            $('.'+value).show();
        }        
    }




});
</script>