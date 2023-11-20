function justifiedGrid(parameters){var $hgrid_container=$(parameters.gridContainer);var $hgrid_items=$(parameters.gridItems);var imagesLoadedEnabled=parameters.enableImagesLoaded;var gutter=parameters.gutter;function hgrid_get_orientation(element){if(element.width()>=element.height()){return"l";}else{return"p";}}
function grid_initialisation($hgrid_items){$hgrid_items.each(function(index){$(this).css('padding',gutter+"px");$(this).attr('data-index',index);$(this).addClass('hgrid-item loaded');$(this).removeClass('resized');});$hgrid_items.each(function(){$(this).css('width',$(this).find('img').width());$(this).css('height',$(this).find('img').height());$(this).addClass('resized');});orientations=new Array;$hgrid_items.each(function(){orientations.push(hgrid_get_orientation($(this)));});}
function construct_lines(){if($(window).width()>=960){max_line_score=6;}
if($(window).width()>=660&&$(window).width()<=960){max_line_score=6;}
if($(window).width()<=660){max_line_score=4;}
var current_score=0;var number_of_images=orientations.length;lines=new Array;var line=new Array;line_score=new Array;orientations.forEach(function(orientation,index){if(orientation=='l'){if(current_score+2<=max_line_score){if(index!=number_of_images-1){current_score+=2;line.push($('.hgrid-item[data-index='+index+']'));}
else{current_score+=2;line_score.push(current_score);line.push($('.hgrid-item[data-index='+index+']'));lines.push(line);}}
else{if(index!=number_of_images-1){line_score.push(current_score);current_score=2;lines.push(line);line=new Array;line.push($('.hgrid-item[data-index='+index+']'));}
else{line_score.push(current_score);current_score=2;line_score.push(current_score);lines.push(line);line=new Array;line.push($('.hgrid-item[data-index='+index+']'));lines.push(line);}}}
else{if(current_score+1<=max_line_score){if(index!=number_of_images-1){current_score+=1;line.push($('.hgrid-item[data-index='+index+']'));}
else{current_score+=1;line_score.push(current_score);line.push($('.hgrid-item[data-index='+index+']'));lines.push(line);}}
else{if(index!=number_of_images-1){line_score.push(current_score);current_score=1;lines.push(line);line=new Array;line.push($('.hgrid-item[data-index='+index+']'));}
else{line_score.push(current_score);current_score=1;line_score.push(current_score);lines.push(line);line=new Array;line.push($('.hgrid-item[data-index='+index+']'));lines.push(line);}}}});}
function magic(){lines.forEach(function(line,line_index){if(line_score[line_index]>=max_line_score-1){var images_in_line=line.length;$theContainer=$hgrid_container;var L=$theContainer.width()-2;var m=0;var oW=[];var oH=[];var r=[];var count=0;line.forEach(function(hgrid_item,index){var imgWidth=hgrid_item.width();var imgHeight=hgrid_item.height();oW.push(imgWidth);oH.push(imgHeight);r.push(imgWidth/imgHeight);count+=1;});var rW=[];var sum=0;for(i=0;i<=count-1;i++){for(j=0;j<=count-1;j++){sum+=r[j]/r[i];}
var rWi=(L-(count-1)*m)/sum;rW.push(rWi);sum=0;}
var lineHeight=rW[0]/r[0];var i=0;line.forEach(function(hgrid_item,index){hgrid_item.css({'height':lineHeight,'width':rW[i]});hgrid_item.animate({'opacity':1},500);i+=1;});}
else{var images_in_line=line.length;$theContainer=$hgrid_container;if(line_score[line_index]<=max_line_score/2){var L=$theContainer.width()/2-2;}
else{var L=$theContainer.width()-$theContainer.width()/3-2;}
var m=0;var oW=[];var oH=[];var r=[];var count=0;line.forEach(function(hgrid_item,index){var imgWidth=hgrid_item.width();var imgHeight=hgrid_item.height();oW.push(imgWidth);oH.push(imgHeight);r.push(imgWidth/imgHeight);count+=1;});var rW=[];var sum=0;for(i=0;i<=count-1;i++){for(j=0;j<=count-1;j++){sum+=r[j]/r[i];}
var rWi=(L-(count-1)*m)/sum;rW.push(rWi);sum=0;}
var lineHeight=rW[0]/r[0];var i=0;line.forEach(function(hgrid_item,index){hgrid_item.css({'height':lineHeight,'width':rW[i]});hgrid_item.animate({'opacity':1},500);i+=1;});}});}
this.reInitGrid=function(){$hgrid_items.each(function(){$(this).attr('style','');});grid_initialisation($hgrid_items);construct_lines();magic();}
this.initGrid=function(){var grid=this;if(imagesLoadedEnabled){$hgrid_container.imagesLoaded(function(){grid_initialisation($hgrid_items);construct_lines();magic();});}
else{var $elems=$('#div').find('img, iframe');var elemsCount=$elems.length;var loadedCount=0;$elems.on('load',function(){loadedCount++;if(loadedCount==elemsCount){grid_initialisation($hgrid_items);construct_lines();magic();}});grid.reInitGrid();}
$(window).on('resize',function(){grid.reInitGrid();});}}