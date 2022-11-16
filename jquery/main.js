$(document).ready(function () {

     // PROJECTS

  // $('#cover').click(function (e) { 
  //   e.preventDefault();
  //   $('#cover').hide('slide', {direction: 'left'}, 2000);
    
  // });
     
// $('#cover').hide();
 
  $('#cover').css({
    "transition": "ease 2s",
    "width":"0px",
    "opacity": "0"
  });



  $('#link-about,#link-about-2,#link-about-3').fadeIn(2000);
  $('#link-projects,#link-projects-2,#link-projects-3').fadeIn(4000);
  $('#link-contact, #link-contact-2,#link-contact-3').fadeIn(7000);
    
   
  



    // Click event for about me button

    $('.about-me').click(function (e) { 
        e.preventDefault();
       $('.welcome,.contact,.projects').css('display', 'none');
       $('.about').fadeIn(1000);

     });

     // Click event for my project button

    //  $('.my-project').click(function (e) { 
    //     e.preventDefault();
   
    // $('.welcome,.contact,.about').css('display', 'none');
    //    $('.projects').fadeIn(1000);

    //  });

     // Click event for contact me button
     $('.contact-me').click(function (e) { 
        e.preventDefault();
   
    $('.welcome,.projects,.about').css('display', 'none');
       $('.contact').fadeIn(1000);

     });

    $('home-btn').click(function (e) { 
      e.preventDefault();
      this.location.reload();
      
    });

  $( "#mail-icon" ).tooltip();
  $( "#browser-icon" ).tooltip();
  $( "#facebook-icon" ).tooltip();
  $( "#linkdin-icon" ).tooltip();
  $( "#phone-icon" ).tooltip();


  

});
