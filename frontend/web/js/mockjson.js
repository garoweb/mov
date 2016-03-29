
var evo  =  {

    _ParentCategs : {},

    _ChildCategs : {},

	_byId : function(el)
	{
		return document.getElementById(el);
	},

	_byClass : function(el)
	{
		return document.getElementsByClassName(el);
	},


	// Listing main categs 
	LoadMainCategs : function()
	{	
		$.ajax({
			type:'GET', 
			url:'/categs/list',
			dataType:"json",
			success:function(d){
				evo._ParentCategs = d; 
				// console.log(d);
				evo.BulidMainCategsGrid(d, {'aim':'mokData', 'fillType':'add'});
				evo.SelectingCategs();
			}
		}); 
	},


	BulidMainCategsGrid : function(data, target)
	{
		var html =""; 
		console.log('data - ', data);
		var o = 0; 
		console.log(data[1]);
		
		/*for(var e in data){
			html += e['id'];

			o++; 
		}*/

		for(var i =0; i<data.length; i++){
			html += '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 grid categ-tabs" data-categ_id="'+data[i]['id']+'"><div class="file-preview-thumbnails"><div class="file-preview-frame" ><img  src="/frontend/web/uploads/'+data[i]['categ_img']+'"" alt="'+data[i]['categ_name']+'" class="file-preview-image" title="Chrysanthemum.jpg" alt="Chrysanthemum.jpg" style="width:auto;height:160px;"><div class="file-thumbnail-footer"><div class="file-footer-caption" title="'+data[i]['categ_name']+'">'+data[i]['categ_name']+'</div></div></div></div></div>';
		}

		if(typeof target.aim !== 'undefined'){

			if(target.fillType == 'add')
				evo._byId(target['aim']).innerHTML = html; 
			else
				evo._byId(target['aim']).innerHTML += html; 
		}
			
			
	},


	SelectingCategs : function()
	{
		var categTabs = evo._byClass("categ-tabs"); 
		for(c = 0; c < categTabs.length; c++)
		{
			categTabs[c].onclick = evo.callCurrentItems;
		}
	},


	callCurrentItems : function()
	{

		var curCateg = this.getAttribute('data-categ_id'); 

		$.ajax({
			type:'GET', 
			url:'/gallery/current-items?id='+curCateg ,
			dataType:"json",
			success:function(d){
				evo._ChildCategs = d; 
				evo.SliderLayout(d, {'aim':'mokData', 'fillType':'add'});
				 
			}
		}); 

	},

	SliderLayout : function(data, target)
	{
		var itemsCount = data.length; 
		evo._SubCategsSlideCount = itemsCount;
		var nextAim, initaim, currentItem="";

		if(itemsCount == 0)
			return false; 

		 var html = "<div class='container-fluid'><div class='col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3 col-xs-12 slide-holder'>";

		 

		if(itemsCount >= 2){
		 	nextAim = 1; 
		    initaim = 0;
		} else {
			nextAim = 0;
		    initaim = 0; 
		}
		 	
		 html +="<button class='slide-arows glyphicon glyphicon-chevron-left left-arrow' id='prevbtn' data-aim='"+initaim+"'></button>";
		 html +="<button class='slide-arows glyphicon glyphicon-chevron-right right-arrow' id='nextbtn' data-aim='"+nextAim+"'></button>";
		 for(var i =0; i<itemsCount; i++){
	        currentItem = (i==0) ? 'active' : '';
			html += '<div class="grid categ-tabs slide-theater '+currentItem+'" id="'+i+'"><img  src="/frontend/web/uploads/'+data[i]['categ_img']+'"" alt="'+data[i]['categ_name']+'" class="file-preview-image " id="slide-'+i+'" title="'+data[i]['categ_name']+'" alt="'+data[i]['categ_name']+'" /></div>';
		}
		html +="</div></div>";

		html += "<div class='slider slider-nav'>";
		for(var i =0; i<data.length; i++){
			html += '<div class="col-lg-3 col-md-4 col-sm-2 col-xs-2 grid categ-tabs  slide-thumbs " data-aim="'+i+'"><img  src="/frontend/web/uploads/'+data[i]['categ_img']+'"" alt="'+data[i]['categ_name']+'" class="file-preview-image" title="Chrysanthemum.jpg" alt="Chrysanthemum.jpg"></div>';
		}
		html +="</div>";


		if(typeof target.aim !== 'undefined'){

			if(target.fillType == 'add')
				evo._byId(target['aim']).innerHTML = html; 
			else
				evo._byId(target['aim']).innerHTML += html; 
		}
		evo.sliderController(); 
		evo.SlideThumbsNavig();

	},

	updateSlideState : function(curSlide, moveType)
	{
		var allSlides = evo._byClass("slide-theater");
		for(var s=0; s<allSlides.length; s++){
			allSlides[s].setAttribute('class', 'grid categ-tabs slide-theater');
		}
		evo._byId(curSlide).setAttribute('class', 'grid categ-tabs slide-theater active');

		var slideItemsCount = evo._SubCategsSlideCount - 1; 
		var currentTaget = (curSlide-0); 
		var nextAim, prevAim = ""; 
		if(slideItemsCount ==  currentTaget ){
			 nextAim = 0; 
			 prevAim = slideItemsCount - 1; 
		}else if(currentTaget == 0){
			if(slideItemsCount >=2){
				nextAim = 1; 
				prevAim = slideItemsCount;
			}else{
				nextAim = 0; 
				prevAim = 0;
			}
			

			
		}else{
			nextAim = currentTaget + 1; 
			prevAim = currentTaget - 1;
		}

		evo.AppendCoordsToArrows(nextAim, prevAim); 

	},

	AppendCoordsToArrows:function(nextAim, prevAim)
	{
		evo._byId("prevbtn").setAttribute('data-aim', prevAim); 
		evo._byId("nextbtn").setAttribute('data-aim', nextAim); 
	},

	sliderController : function()
	{
		if(evo._byId("prevbtn")){
			evo._byId("prevbtn").onclick = function(){
				
				evo.updateSlideState(this.getAttribute("data-aim"), 'prev');
			}
		}
		if(evo._byId("nextbtn")){
			evo._byId("nextbtn").onclick = function(){
				evo.updateSlideState(this.getAttribute("data-aim"), 'next');
			}
		}
	},

	SlideThumbsNavig : function()
	{
		var thumbs = evo._byClass("slide-thumbs"); 
		for(var s=0; s<thumbs.length; s++){

			thumbs[s].onclick  = function()
			{
				evo.updateSlideState(this.getAttribute("data-aim"), 'prev');
			}
		}
	},

};



evo.LoadMainCategs(); 



