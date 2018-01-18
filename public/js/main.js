$('document').ready(function () {
    var count1 = 1;
    var count2 = 1;
    var count3 = 1;
    var count4 = 1;
    var count5 = 1;
    $('.collapse1').hide();
    $('.collapse2').hide();
    $('.collapse3').hide();
    $('.collapse4').hide();
    $('.collapse5').hide();

   $('.jscollapse1').click(function () {

       switch (count1){
           case 1:
                  $(this).find('span').removeClass("fa-angle-down").addClass("fa-angle-up");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideDown(100);
               count1++;
               break;
           case 2:
               $(this).find('span').removeClass("fa-angle-up").addClass("fa-angle-down");
               var toggle  = $(this).attr("id");
               $('.'+toggle).slideUp(100);
               count1 = 1;
               break
       }
       return count1;
   });
    $('.jscollapse2').click(function () {

        switch (count2){
            case 1:
                $(this).find('span').removeClass("fa-angle-down").addClass("fa-angle-up");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideDown(100);
                count2++;
                break;
            case 2:
                $(this).find('span').removeClass("fa-angle-up").addClass("fa-angle-down");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideUp(100);
                count2 = 1;
                break
        }
        return count2;
    });
    $('.jscollapse3').click(function () {

        switch (count3){
            case 1:
                $(this).find('span').removeClass("fa-angle-down").addClass("fa-angle-up");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideDown(100);
                count3++;
                break;
            case 2:
                $(this).find('span').removeClass("fa-angle-up").addClass("fa-angle-down");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideUp(100);
                count3 = 1;
                break
        }
        return count3;
    });
    $('.jscollapse4').click(function () {

        switch (count4){
            case 1:
                $(this).find('span').removeClass("fa-angle-down").addClass("fa-angle-up");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideDown(100);
                count4++;
                break;
            case 2:
                $(this).find('span').removeClass("fa-angle-up").addClass("fa-angle-down");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideUp(100);
                count4 = 1;
                break
        }
        return count4;
    });
    $('.jscollapse5').click(function () {

        switch (count5){
            case 1:
                $(this).find('span').removeClass("fa-angle-down").addClass("fa-angle-up");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideDown(100);
                count5++;
                break;
            case 2:
                $(this).find('span').removeClass("fa-angle-up").addClass("fa-angle-down");
                var toggle  = $(this).attr("id");
                $('.'+toggle).slideUp(100);
                count5 = 1;
                break
        }
        return count5;
    });
});