/**
Vertigo Tip by www.vertigo-project.com
Requires jQuery
*/

this.vtip = function() {    
    this.xOffset = 0; // x distance from mouse
    this.yOffset = 35; // y distance from mouse
    jQuery(".vtip").unbind().hover(    
        function(e) {
			this.t = arrayData[this.id.substr(5)]; 
			if (this.t==undefined) {
				this.t = arrayData[0];
			}
			this.title = ''; 
			this.top = (e.pageY + yOffset); this.left = (e.pageX + xOffset);

			jQuery('body').append( '<div id="vtip"><img id="vtipArrow" />' + this.t + '</div>' );
                        
            jQuery('div#vtip #vtipArrow').attr("src", '../scripts/vtipArrow.gif');
            jQuery('div#vtip').css("top", (this.top)+"px").css("left", this.left+"px").fadeIn("slow");
            
        },
        function() {
            this.title = this.t;
            jQuery("div#vtip").fadeOut("slow").remove();
        }
    ).mousemove(
        function(e) {
            this.top = (e.pageY + yOffset)-5;
            this.left = (e.pageX + xOffset);
                         
            jQuery("div#vtip").css("top", this.top+"px").css("left", this.left+"px");
        }
    );            
    
};
//jQuery.noConflict();
jQuery(document).ready(function(jQuery){vtip();})