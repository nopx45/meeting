function checkform ( form )
{
  dt_s_tmp = form.booking_date.value + "T" + form.time_start_hr.value + ":" + form.time_start_min.value + ":00";
  dt_e_tmp = form.booking_date.value + "T" + form.time_end_hr.value + ":" + form.time_end_min.value + ":00";
  var dt_s = new Date(dt_s_tmp);
  var dt_e = new Date(dt_e_tmp);

  if (form.subject.value == "") {
    alert( "Please insert Subject !" );
    form.subject.focus();
    return false ;
  }

  if (form.header.value == "") {
    alert( "Please insert Chairman !" );
    form.header.focus();
    return false ;
  }

  if (form.room_id.value == "") {
    alert( "Please select Meeting Room !" );
    form.room_id.focus();
    return false ;
  }

  if (form.booking_date.value == "") {
    alert( "Please select Start Date !" );
    form.booking_date.focus();
    return false ;
  }
  
  if (form.booking_date2.value == "") {
    alert( "Please select End Date !" );
    form.booking_date2.focus();
    return false ;
  }

  if(dt_s >= dt_e)
  {
    alert( "Please select Time !" );
    form.time_end_min.focus();
    return false ;
  }

  return true ;
}
