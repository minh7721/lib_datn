!function(){function e(){return a.tinymce}var t,n,i,r=[],a="undefined"!=typeof global?global:window,c=a.jQuery;c.fn.tinymce=function(t){var l,u,s,f,p=this,d="";return p.length?t?(p.css("visibility","hidden"),a.tinymce||n||!(l=t.script_url)?1===n?r.push(m):m():(n=1,u=l.substring(0,l.lastIndexOf("/")),-1!=l.indexOf(".min")&&(d=".min"),a.tinymce=a.tinyMCEPreInit||{base:u,suffix:d},-1!=l.indexOf("gzip")&&(s=t.language||"en",l=l+(/\?/.test(l)?"&":"?")+"js=true&core=true&suffix="+escape(d)+"&themes="+escape(t.theme||"modern")+"&assets="+escape(t.plugins||"")+"&languages="+(s||""),a.tinyMCE_GZ||(a.tinyMCE_GZ={start:function(){function n(t){e().ScriptLoader.markDone(e().baseURI.toAbsolute(t))}n("langs/"+s+".js"),n("themes/"+t.theme+"/theme"+d+".js"),n("themes/"+t.theme+"/langs/"+s+".js"),c.each(t.plugins.split(","),(function(e,t){t&&(n("assets/"+t+"/plugin"+d+".js"),n("assets/"+t+"/langs/"+s+".js"))}))},end:function(){}})),(f=document.createElement("script")).type="text/javascript",f.onload=f.onreadystatechange=function(i){i=i||window.event,2===n||"load"!=i.type&&!/complete|loaded/.test(f.readyState)||(e().dom.Event.domLoaded=1,n=2,t.script_loaded&&t.script_loaded(),m(),c.each(r,(function(e,t){t()})))},f.src=l,document.body.appendChild(f)),p):e()?e().get(p[0].id):null:p;function m(){var n=[],r=0;i||(o(),i=!0),p.each((function(i,a){var c,o=a.id,l=t.oninit;o||(a.id=o=e().DOM.uniqueId()),e().get(o)||(c=e().createEditor(o,t),n.push(c),c.on("init",(function(){var t,i=l;p.css("visibility",""),l&&++r==n.length&&("string"==typeof i&&(t=-1===i.indexOf(".")?null:e().resolve(i.replace(/\.\w+$/,"")),i=e().resolve(i)),i.apply(t||e(),n))})))})),c.each(n,(function(e,t){t.render()}))}},c.extend(c.expr[":"],{tinymce:function(t){var n;return!!(t.id&&"tinymce"in a&&(n=e().get(t.id))&&n.editorManager===e())}});var o=function(){function n(t){"remove"===t&&this.each((function(e,t){var n=o(t);n&&n.remove()})),this.find("span.mceEditor,div.mceEditor").each((function(t,n){var i=e().get(n.id.replace(/_parent$/,""));i&&i.remove()}))}function i(t){var i,r=this;if(null!=t)n.call(r),r.each((function(n,i){var r;(r=e().get(i.id))&&r.setContent(t)}));else if(0<r.length&&(i=e().get(r[0].id)))return i.getContent()}function r(e){return e&&e.length&&a.tinymce&&e.is(":tinymce")}var o=function(t){return t&&t.id&&a.tinymce?e().get(t.id):null},l={};c.each(["text","html","val"],(function(e,n){var a=l[n]=c.fn[n],u="text"===n;c.fn[n]=function(e){var n=this;if(!r(n))return a.apply(n,arguments);if(e!==t)return i.call(n.filter(":tinymce"),e),a.apply(n.not(":tinymce"),arguments),n;var l="",s=arguments;return(u?n:n.eq(0)).each((function(e,t){var n=o(t);l+=n?u?n.getContent().replace(/<(?:"[^"]*"|'[^']*'|[^'">])*>/g,""):n.getContent({save:!0}):a.apply(c(t),s)})),l}})),c.each(["append","prepend"],(function(e,n){var i=l[n]=c.fn[n],a="prepend"===n;c.fn[n]=function(e){var n=this;return r(n)?e!==t?("string"==typeof e&&n.filter(":tinymce").each((function(t,n){var i=o(n);i&&i.setContent(a?e+i.getContent():i.getContent()+e)})),i.apply(n.not(":tinymce"),arguments),n):void 0:i.apply(n,arguments)}})),c.each(["remove","replaceWith","replaceAll","empty"],(function(e,t){var i=l[t]=c.fn[t];c.fn[t]=function(){return n.call(this,t),i.apply(this,arguments)}})),l.attr=c.fn.attr,c.fn.attr=function(e,n){var a=this,u=arguments;if(!e||"value"!==e||!r(a))return l.attr.apply(a,u);if(n!==t)return i.call(a.filter(":tinymce"),n),l.attr.apply(a.not(":tinymce"),u),a;var s=a[0],f=o(s);return f?f.getContent({save:!0}):l.attr.apply(c(s),u)}}}();
