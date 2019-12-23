define(['jquery','Magento_Ui/js/form/element/date'],function ($,date){
  return  date.extend({
    defaults:{
      options:{
        beforeShowDay: function (date) {
          let allowDates = [8,9,10,11];
          if (allowDates.includes(date.getDate())){
            return [true];
          }else{
            return [false];
          }
        }
      }
    }
  });
});