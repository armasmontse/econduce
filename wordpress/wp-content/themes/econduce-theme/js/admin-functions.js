!function(modules){function __webpack_require__(moduleId){if(installedModules[moduleId])return installedModules[moduleId].exports;var module=installedModules[moduleId]={exports:{},id:moduleId,loaded:!1};return modules[moduleId].call(module.exports,module,module.exports,__webpack_require__),module.loaded=!0,module.exports}var installedModules={};return __webpack_require__.m=modules,__webpack_require__.c=installedModules,__webpack_require__.p="./js/",__webpack_require__(0)}([function(module,exports,__webpack_require__){"use strict";__webpack_require__(1),console.log("Hello world!")},function(module,exports){"use strict";var $=jQuery,metaboxes=["Cltvo_Vacancy_Responsabilities","Cltvo_Vacancy_Habilities","Cltvo_Vacancy_Experience"];$(document).ready(function(){metaboxes.forEach(function(item,index){var selector="."+item,tBody=$(selector).find(".tbody_JS").get(0);$(selector).on("click",".add_JS",function(){var meta_name=$(this).attr("meta-name"),lastkey=0,nextKey=0;$(tBody).find("tr").each(function(){var actualKey=parseInt($(this).attr("meta-key"));lastkey<=actualKey&&(lastkey=actualKey)}),nextKey=lastkey+1;var toClone=$(selector).find(".clone-JS").get(0),clone=$(toClone).clone().appendTo(tBody).css("visibility","visible").attr("meta-key",nextKey).attr("id",meta_name+"_"+nextKey).removeClass("clone-JS");clone.find("*").attr("disabled",!1),clone.find("td").each(function(){var $this=$(this),inputName=$this.attr("input-name");$this.find("input").each(function(){$(this).attr("name",meta_name+"[items]["+nextKey+"]["+inputName+"]").attr("id",meta_name+"_"+nextKey+"_"+inputName)})})}),$(selector).on("click",".delete_JS",function(e){e.preventDefault();var meta_name=$(this).attr("meta-name"),num_ele=$(tBody).children("tr").length;num_ele>1&&$(this).parent().parent().remove();var counter=0;$(tBody).find("tr").each(function(){$(this).attr("meta-key",counter).attr("id",meta_name+"_"+counter),$(this).find("td").each(function(){var inputName=$(this).attr("input-name");$(this).find("input").each(function(){$(this).attr("name",meta_name+"[items]["+counter+"]["+inputName+"]").attr("id",meta_name+"_"+counter+"_"+inputName)})}),counter++})})})})}]);