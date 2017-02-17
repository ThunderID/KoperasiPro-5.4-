/**
 * @name        jQuery Auto TabIndex Plugin
 * @author      VTwo Group
 * @version     0.1
 * @url         http://vtwo.org/jquery/plugin/autotabindex/
 * @license     MIT License
 */
(function($) {
   $.fn.autotabindex = function(options) { 
       
       var settings = $.extend({
            list: '',
            classname: ''
       }, options);
         
       //Remove all 
       var counter = 1;
       var el      = $('*'); 
       var kids    = el.children();
       kids.removeAttr('tabindex');
       
       if(settings.list!='')  
          {
             var array = settings.list.split(',');  
             for(var i=0; i<array.length; i++)
                {
                   kids.filter(array[i]).attr('tabindex', counter); 
                   
                   //Add and Remove Class
                   if(settings.classname)
                      {
                         kids.filter(array[i]).focusin(function(){
                            $(this).addClass(settings.classname);
                         });
                  
                         kids.focusout(array[i]).blur(function(){
                            $(this).removeClass(settings.classname);
                         });
                      } 
                      
                  counter++;
               }
         }
}}(jQuery)); 
