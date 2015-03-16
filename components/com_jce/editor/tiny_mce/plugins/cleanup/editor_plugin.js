(function(){var each=tinymce.each,extend=tinymce.extend;tinymce.create('tinymce.plugins.CleanupPlugin',{init:function(ed,url){var self=this;this.editor=ed;if(ed.settings.verify_html===false){ed.settings.validate=false}ed.onPreInit.add(function(){ed.parser.addAttributeFilter('onclick, ondblclick',function(nodes,name){for(var i=0,len=nodes.length;i<len;i++){var node=nodes[i];var ev=node.attr(name);if(ev){node.attr('data-mce-'+name,ev);node.attr(name,'')}}});ed.serializer.addAttributeFilter('onclick, ondblclick',function(nodes,name,args){for(var i=0,len=nodes.length;i<len;i++){var node=nodes[i];var ev=node.attr('data-mce-'+name);if(ev){node.attr(name,ev);node.attr('data-mce-'+name,'')}}});if(!ed.settings.allow_html_in_named_anchor){ed.parser.addAttributeFilter('id',function(nodes,name){var i=nodes.length,sibling,prevSibling,parent,node;while(i--){node=nodes[i];if(node.name==='a'&&!node.attr('href')&&node.firstChild){parent=node.parent;sibling=node.lastChild;do{prevSibling=sibling.prev;parent.insert(sibling,node);sibling=prevSibling}while(sibling)}}})}ed.onVisualAid.add(function(ed,n,s){each(ed.dom.select('a[id]',n),function(e){if(!e.href){if(s){ed.dom.addClass(e,'mceItemAnchor')}else{ed.dom.removeClass(e,'mceItemAnchor')}}return})})});if(ed.settings.validate===false&&ed.settings.verify_html===false){ed.addCommand('mceCleanup',function(){var s=ed.settings,se=ed.selection,bm;bm=se.getBookmark();var content=ed.getContent({cleanup:true});var schema=new tinymce.html.Schema({validate:true,verify_html:true,valid_styles:s.valid_styles,valid_children:s.valid_children,custom_elements:s.custom_elements,extended_valid_elements:s.extended_valid_elements});content=new tinymce.html.Serializer({validate:true},schema).serialize(new tinymce.html.DomParser({validate:true},schema).parse(content));ed.setContent(content,{cleanup:true});se.moveToBookmark(bm)})}ed.onBeforeSetContent.add(function(ed,o){o.content=o.content.replace(/<pre xml:\s*(.*?)>(.*?)<\/pre>/g,'<pre class="geshi-$1">$2</pre>')});ed.onPostProcess.add(function(ed,o){if(o.set){o.content=o.content.replace(/<pre xml:\s*(.*?)>(.*?)<\/pre>/g,'<pre class="geshi-$1">$2</pre>')}if(o.get){o.content=o.content.replace(/<pre class="geshi-(.*?)">(.*?)<\/pre>/g,'<pre xml:$1>$2</pre>');o.content=o.content.replace(/<a([^>]*)class="jce(box|popup|lightbox|tooltip|_tooltip)"([^>]*)><\/a>/gi,'');o.content=o.content.replace(/<span class="jce(box|popup|lightbox|tooltip|_tooltip)">(.*?)<\/span>/gi,'$2');o.content=o.content.replace(/_mce_(src|href|style|coords|shape)="([^"]+)"\s*?/gi,'');if(ed.getParam('keep_nbsp',true)){o.content=o.content.replace(/\u00a0/g,'&nbsp;')}if(ed.getParam('verify_html')===false){o.content=o.content.replace(/<body([^>]*)>([\s\S]*)<\/body>/,'$2');o.content=o.content.replace(/<p([^>]*)><\/p>/g,'<p$1>&nbsp;</p>')}}});ed.onGetContent.add(function(ed,o){if(o.save){if(ed.getParam('cleanup_pluginmode')){o.content=o.content.replace(/&#39;/gi,"'");o.content=o.content.replace(/&apos;/gi,"'");o.content=o.content.replace(/&amp;/gi,"&");o.content=o.content.replace(/&quot;/gi,'"')}}});ed.addButton('cleanup',{title:'advanced.cleanup_desc',cmd:'mceCleanup'})},getInfo:function(){return{longname:'Cleanup',author:'Ryan Demmer',authorurl:'http://www.joomlacontenteditor.net',infourl:'http://www.joomlacontenteditor.net',version:'2.0.14'}}});tinymce.PluginManager.add('cleanup',tinymce.plugins.CleanupPlugin)})();