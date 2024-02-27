var m=(e,a)=>()=>(a||e((a={exports:{}}).exports,a),a.exports);var v=m((u,p)=>{/*!
 * Lightbox v2.11.4
 * by Lokesh Dhakar
 *
 * More info:
 * http://lokeshdhakar.com/projects/lightbox2/
 *
 * Copyright Lokesh Dhakar
 * Released under the MIT license
 * https://github.com/lokesh/lightbox2/blob/master/LICENSE
 *
 * @preserve
 */(function(e,a){typeof define=="function"&&define.amd?define(["jquery"],a):typeof u=="object"?p.exports=a(require("jquery")):e.lightbox=a(e.jQuery)})(void 0,function(e){function a(t){this.album=[],this.currentImageIndex=void 0,this.init(),this.options=e.extend({},this.constructor.defaults),this.option(t)}return a.defaults={albumLabel:"Image %1 of %2",alwaysShowNavOnTouchDevices:!1,fadeDuration:600,fitImagesInViewport:!0,imageFadeDuration:600,positionFromTop:50,resizeDuration:700,showImageNumberLabel:!0,wrapAround:!1,disableScrolling:!1,sanitizeTitle:!1},a.prototype.option=function(t){e.extend(this.options,t)},a.prototype.imageCountLabel=function(t,i){return this.options.albumLabel.replace(/%1/g,t).replace(/%2/g,i)},a.prototype.init=function(){var t=this;e(document).ready(function(){t.enable(),t.build()})},a.prototype.enable=function(){var t=this;e("body").on("click","a[rel^=lightbox], area[rel^=lightbox], a[data-lightbox], area[data-lightbox]",function(i){return t.start(e(i.currentTarget)),!1})},a.prototype.build=function(){if(!(e("#lightbox").length>0)){var t=this;e('<div id="lightboxOverlay" tabindex="-1" class="lightboxOverlay"></div><div id="lightbox" tabindex="-1" class="lightbox"><div class="lb-outerContainer"><div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt=""/><div class="lb-nav"><a class="lb-prev" role="button" tabindex="0" aria-label="Previous image" href="" ></a><a class="lb-next" role="button" tabindex="0" aria-label="Next image" href="" ></a></div><div class="lb-loader"><a class="lb-cancel" role="button" tabindex="0"></a></div></div></div><div class="lb-dataContainer"><div class="lb-data"><div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div><div class="lb-closeContainer"><a class="lb-close" role="button" tabindex="0"></a></div></div></div></div>').appendTo(e("body")),this.$lightbox=e("#lightbox"),this.$overlay=e("#lightboxOverlay"),this.$outerContainer=this.$lightbox.find(".lb-outerContainer"),this.$container=this.$lightbox.find(".lb-container"),this.$image=this.$lightbox.find(".lb-image"),this.$nav=this.$lightbox.find(".lb-nav"),this.containerPadding={top:parseInt(this.$container.css("padding-top"),10),right:parseInt(this.$container.css("padding-right"),10),bottom:parseInt(this.$container.css("padding-bottom"),10),left:parseInt(this.$container.css("padding-left"),10)},this.imageBorderWidth={top:parseInt(this.$image.css("border-top-width"),10),right:parseInt(this.$image.css("border-right-width"),10),bottom:parseInt(this.$image.css("border-bottom-width"),10),left:parseInt(this.$image.css("border-left-width"),10)},this.$overlay.hide().on("click",function(){return t.end(),!1}),this.$lightbox.hide().on("click",function(i){e(i.target).attr("id")==="lightbox"&&t.end()}),this.$outerContainer.on("click",function(i){return e(i.target).attr("id")==="lightbox"&&t.end(),!1}),this.$lightbox.find(".lb-prev").on("click",function(){return t.currentImageIndex===0?t.changeImage(t.album.length-1):t.changeImage(t.currentImageIndex-1),!1}),this.$lightbox.find(".lb-next").on("click",function(){return t.currentImageIndex===t.album.length-1?t.changeImage(0):t.changeImage(t.currentImageIndex+1),!1}),this.$nav.on("mousedown",function(i){i.which===3&&(t.$nav.css("pointer-events","none"),t.$lightbox.one("contextmenu",function(){setTimeout((function(){this.$nav.css("pointer-events","auto")}).bind(t),0)}))}),this.$lightbox.find(".lb-loader, .lb-close").on("click keyup",function(i){if(i.type==="click"||i.type==="keyup"&&(i.which===13||i.which===32))return t.end(),!1})}},a.prototype.start=function(t){var i=this,l=e(window);l.on("resize",e.proxy(this.sizeOverlay,this)),this.sizeOverlay(),this.album=[];var g=0;function s(b){i.album.push({alt:b.attr("data-alt"),link:b.attr("href"),title:b.attr("data-title")||b.attr("title")})}var n=t.attr("data-lightbox"),o;if(n){o=e(t.prop("tagName")+'[data-lightbox="'+n+'"]');for(var r=0;r<o.length;r=++r)s(e(o[r])),o[r]===t[0]&&(g=r)}else if(t.attr("rel")==="lightbox")s(t);else{o=e(t.prop("tagName")+'[rel="'+t.attr("rel")+'"]');for(var h=0;h<o.length;h=++h)s(e(o[h])),o[h]===t[0]&&(g=h)}var d=l.scrollTop()+this.options.positionFromTop,c=l.scrollLeft();this.$lightbox.css({top:d+"px",left:c+"px"}).fadeIn(this.options.fadeDuration),this.options.disableScrolling&&e("body").addClass("lb-disable-scrolling"),this.changeImage(g)},a.prototype.changeImage=function(t){var i=this,l=this.album[t].link,g=l.split(".").slice(-1)[0],s=this.$lightbox.find(".lb-image");this.disableKeyboardNav(),this.$overlay.fadeIn(this.options.fadeDuration),e(".lb-loader").fadeIn("slow"),this.$lightbox.find(".lb-image, .lb-nav, .lb-prev, .lb-next, .lb-dataContainer, .lb-numbers, .lb-caption").hide(),this.$outerContainer.addClass("animating");var n=new Image;n.onload=function(){var o,r,h,d,c,b;s.attr({alt:i.album[t].alt,src:l}),e(n),s.width(n.width),s.height(n.height);var f=n.width/n.height;b=e(window).width(),c=e(window).height(),d=b-i.containerPadding.left-i.containerPadding.right-i.imageBorderWidth.left-i.imageBorderWidth.right-20,h=c-i.containerPadding.top-i.containerPadding.bottom-i.imageBorderWidth.top-i.imageBorderWidth.bottom-i.options.positionFromTop-70,g==="svg"?(f>=1?(r=d,o=parseInt(d/f,10)):(r=parseInt(h/f,10),o=h),s.width(r),s.height(o)):(i.options.fitImagesInViewport?(i.options.maxWidth&&i.options.maxWidth<d&&(d=i.options.maxWidth),i.options.maxHeight&&i.options.maxHeight<h&&(h=i.options.maxHeight)):(d=i.options.maxWidth||n.width||d,h=i.options.maxHeight||n.height||h),(n.width>d||n.height>h)&&(n.width/d>n.height/h?(r=d,o=parseInt(n.height/(n.width/r),10),s.width(r),s.height(o)):(o=h,r=parseInt(n.width/(n.height/o),10),s.width(r),s.height(o)))),i.sizeContainer(s.width(),s.height())},n.src=this.album[t].link,this.currentImageIndex=t},a.prototype.sizeOverlay=function(){var t=this;setTimeout(function(){t.$overlay.width(e(document).width()).height(e(document).height())},0)},a.prototype.sizeContainer=function(t,i){var l=this,g=this.$outerContainer.outerWidth(),s=this.$outerContainer.outerHeight(),n=t+this.containerPadding.left+this.containerPadding.right+this.imageBorderWidth.left+this.imageBorderWidth.right,o=i+this.containerPadding.top+this.containerPadding.bottom+this.imageBorderWidth.top+this.imageBorderWidth.bottom;function r(){l.$lightbox.find(".lb-dataContainer").width(n),l.$lightbox.find(".lb-prevLink").height(o),l.$lightbox.find(".lb-nextLink").height(o),l.$overlay.trigger("focus"),l.showImage()}g!==n||s!==o?this.$outerContainer.animate({width:n,height:o},this.options.resizeDuration,"swing",function(){r()}):r()},a.prototype.showImage=function(){this.$lightbox.find(".lb-loader").stop(!0).hide(),this.$lightbox.find(".lb-image").fadeIn(this.options.imageFadeDuration),this.updateNav(),this.updateDetails(),this.preloadNeighboringImages(),this.enableKeyboardNav()},a.prototype.updateNav=function(){var t=!1;try{document.createEvent("TouchEvent"),t=!!this.options.alwaysShowNavOnTouchDevices}catch{}this.$lightbox.find(".lb-nav").show(),this.album.length>1&&(this.options.wrapAround?(t&&this.$lightbox.find(".lb-prev, .lb-next").css("opacity","1"),this.$lightbox.find(".lb-prev, .lb-next").show()):(this.currentImageIndex>0&&(this.$lightbox.find(".lb-prev").show(),t&&this.$lightbox.find(".lb-prev").css("opacity","1")),this.currentImageIndex<this.album.length-1&&(this.$lightbox.find(".lb-next").show(),t&&this.$lightbox.find(".lb-next").css("opacity","1"))))},a.prototype.updateDetails=function(){var t=this;if(typeof this.album[this.currentImageIndex].title<"u"&&this.album[this.currentImageIndex].title!==""){var i=this.$lightbox.find(".lb-caption");this.options.sanitizeTitle?i.text(this.album[this.currentImageIndex].title):i.html(this.album[this.currentImageIndex].title),i.fadeIn("fast")}if(this.album.length>1&&this.options.showImageNumberLabel){var l=this.imageCountLabel(this.currentImageIndex+1,this.album.length);this.$lightbox.find(".lb-number").text(l).fadeIn("fast")}else this.$lightbox.find(".lb-number").hide();this.$outerContainer.removeClass("animating"),this.$lightbox.find(".lb-dataContainer").fadeIn(this.options.resizeDuration,function(){return t.sizeOverlay()})},a.prototype.preloadNeighboringImages=function(){if(this.album.length>this.currentImageIndex+1){var t=new Image;t.src=this.album[this.currentImageIndex+1].link}if(this.currentImageIndex>0){var i=new Image;i.src=this.album[this.currentImageIndex-1].link}},a.prototype.enableKeyboardNav=function(){this.$lightbox.on("keyup.keyboard",e.proxy(this.keyboardAction,this)),this.$overlay.on("keyup.keyboard",e.proxy(this.keyboardAction,this))},a.prototype.disableKeyboardNav=function(){this.$lightbox.off(".keyboard"),this.$overlay.off(".keyboard")},a.prototype.keyboardAction=function(t){var i=27,l=37,g=39,s=t.keyCode;s===i?(t.stopPropagation(),this.end()):s===l?this.currentImageIndex!==0?this.changeImage(this.currentImageIndex-1):this.options.wrapAround&&this.album.length>1&&this.changeImage(this.album.length-1):s===g&&(this.currentImageIndex!==this.album.length-1?this.changeImage(this.currentImageIndex+1):this.options.wrapAround&&this.album.length>1&&this.changeImage(0))},a.prototype.end=function(){this.disableKeyboardNav(),e(window).off("resize",this.sizeOverlay),this.$lightbox.fadeOut(this.options.fadeDuration),this.$overlay.fadeOut(this.options.fadeDuration),this.options.disableScrolling&&e("body").removeClass("lb-disable-scrolling")},new a})});export default v();