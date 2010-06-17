
	var animating;
	
	$(document).ready(
		function()
		{
			
			$(".card").bind('click', selectCard);
			
			
		}
	);
	
	function selectCard()
	{
		$(".card:not(.card-selected)").removeClass('card-selected');
		
		if(!animating)
			$(this).addClass('card-selected');
		
		if($(".card-selected").length >= 3)
		{
			checkCards();
		}
	}
	
	function checkCards() {
	
		var found = 0;
	
		for(i=1; i<=12; i++)
		{
			if(found > 0)
				continue;
		
			if($(".card-selected.card-"+i).length > 2)
			{
				found = i;
				continue;
			} else {
			}
		}
		
		if(found > 0)
			foundCards(found);
		
		animating = true;
		setTimeout(function () { $(".card").removeClass('card-selected'); animating = false; }, 750);
	}
	
	function foundCards(type)
	{
		$(".card-"+type).delay(250).animate(
			{ 
				opacity: 0 
			}, 500,
			function() {
				$(this).addClass("card-found");
			
				if($(".card:not(.card-found)").length == 0) {
					$("body").addClass("epic-win");
					$(".win").fadeIn(250);
					
					setTimeout(resetBoard, 2500);
				}
				else
				{
					setTimeout(turnBoard, 1000);
				}
			}
		);
		
	}
	
	function turnBoard() {
	
		if(Math.random() < 0.25) // 25% chance that magic is going to happen.
		{
			$(".gameboard").attr("class", "gameboard gameboard-alt"+Math.ceil(Math.random()*2));;
		}
	}

	function resetBoard() {
		$(".card").removeClass("card-found");
		$(".gameboard").animate({ opacity: 0 }, 400,
			function()
			{
				$(".win").fadeOut(250);
				$(".card").css("opacity", 1);
				$(".gameboard").animate({ opacity: 1 }, 400);
			}
		);
	}