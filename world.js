document.addEventListener("DOMContentLoaded", function(event){
	const btn1 = document.querySelector("#lookup_countries");
	const btn2 = document.querySelector("#lookup_cities");
	let url = "world.php?";
	let resultDiv = document.querySelector("div#result");
	let txtField = document.querySelector("#country");
	let atr = txtField.getAttribute("name");
	
	let searchCountries = function(){
		
		let newUrl = url+atr+"="+txtField.value.trim();
		console.log("Clicked!: "+ newUrl);
		
		fetch(newUrl)
			.then(response=>{return response.text()})
			.then(htmlContent=>{
					resultDiv.innerHTML =""; 
					resultDiv.innerHTML = htmlContent;
				}).catch(error=>{resultDiv.innerHTML ="";
								 resultDiv.innerHTML ='<p class="error"> Couldnt get data</p>';
								 console.log("fetch error");
								});	
	}
	
		let searchCities = function(){
		
		let newUrl = url+atr+"="+txtField.value.trim()+"&lookup=cities";
		console.log("Clicked!: "+ newUrl);
		
		fetch(newUrl)
			.then(response=>{return response.text()})
			.then(htmlContent=>{
					resultDiv.innerHTML =""; 
					resultDiv.innerHTML = htmlContent;
				}).catch(error=>{resultDiv.innerHTML ="";
								 resultDiv.innerHTML ='<p class="error"> Couldnt get data</p>';
								 console.log("fetch error");
								});	
	}
		
		
	btn1.onclick = searchCountries;
	btn2.onclick = searchCities;
	
});