jQuery(document).ready(function($) {
    "use strict";
    
    var addstreamer = function (options) {
        this.init('addstreamer', options, addstreamer.defaults);
    };

    //inherit from Abstract input
    $.fn.editableutils.inherit(addstreamer, $.fn.editabletypes.abstractinput);

    $.extend(addstreamer.prototype, {
        /**
        Renders input from tpl
        @method render() 
        **/        
        render: function() {
           this.$input = this.$tpl.find('input');
        },
        
        /**
        Default method to show value in element. Can be overwritten by display option.
        
        @method value2html(value, element) 
        **/
        value2html: function(value, element) {
            if(!value) {
                $(element).empty();
                return; 
            }
            var html = $('<div>').text(value.streamer).html() + ', ' + $('<div>').text(value.description).html() + ', , ' + $('<div>').text(value.date).html() + ', ' + $('<div>').text(value.start_end).html();
            $(element).html(html); 
        },
        
        /**
        Gets value from element's html
        
        @method html2value(html) 
        **/        
        html2value: function(html) {        
          /*
            you may write parsing method to get value by element's html
            e.g. "Moscow, st. Lenina, bld. 15" => {streamer: "Moscow", description: "Lenina", start_end: "15"}
            but for complex structures it's not recommended.
            Better set value directly via javascript, e.g. 
            editable({
                value: {
                    streamer: "Moscow", 
                    description: "Lenina", 
                    start_end: "15"
                }
            });
          */ 
          return null;  
        },
      
       /**
        Converts value to string. 
        It is used in internal comparing (not for sending to server).
        
        @method value2str(value)  
       **/
       value2str: function(value) {
           var str = '';
           if(value) {
               for(var k in value) {
                   str = str + k + ':' + value[k] + ';';  
               }
           }
           return str;
       }, 
       
       /*
        Converts string to value. Used for reading value from 'data-value' attribute.
        
        @method str2value(str)  
       */
       str2value: function(str) {
           /*
           this is mainly for parsing value defined in data-value attribute. 
           If you will always set value by javascript, no need to overwrite it
           */
           return str;
       },                
       
       /**
        Sets value of input.
        
        @method value2input(value) 
        @param {mixed} value
       **/         
       value2input: function(value) {
           if(!value) {
             return;
           }
           this.$input.filter('[name="streamer"]').val(value.streamer);
           this.$input.filter('[name="description"]').val(value.description);
             this.$input.filter('[name="date"]').val(value.date);
           this.$input.filter('[name="start_end"]').val(value.start_end);
       },       
       
       /**
        Returns value of input.
        
        @method input2value() 
       **/          
       input2value: function() { 
           return {
              streamer: this.$input.filter('[name="streamer"]').val(), 
              description: this.$input.filter('[name="description"]').val(), 
              date: this.$input.filter('[name="date"]').val(), 
              start_end: this.$input.filter('[name="start_end"]').val()
           };
       },        
       
        /**
        Activates input: sets focus on the first field.
        
        @method activate() 
       **/        
       activate: function() {
            this.$input.filter('[name="streamer"]').focus();
       },  
       
       /**
        Attaches handler to submit form in case of 'showbuttons=false' mode
        
        @method autosubmit() 
       **/       
       autosubmit: function() {
           this.$input.keydown(function (e) {
                if (e.which === 13) {
                    $(this).closest('form').submit();
                }
           });
       }       
    });

    addstreamer.defaults = $.extend({}, $.fn.editabletypes.abstractinput.defaults, {
        tpl: '<div class="editable-addstreamer"><label><span>Streamer : </span><input type="text" name="streamer" class="input-small"></label></div>'+
             '<div class="editable-addstreamer"><label><span>Description : </span><input type="text" name="description" class="input-small"></label></div>'+
             '<div class="editable-addstreamer"><label><span>Date : </span><input type="text" name="date" class="input-small"></label></div>'+
             '<div class="editable-addstreamer"><label><span>Heure du stream : </span><input type="text" name="start_end" class="input-mini"></label></div>',
             
        inputclass: ''
    });

    $.fn.editabletypes.addstreamer = addstreamer;

}(window.jQuery));