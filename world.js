document.addEventListener("DOMContentLoaded", function(event){
	const btn  = document.querySelector("#lookup");
	let url = "world.php?";
	let resultDiv = document.querySelector("div#result");
	let txtField = document.querySelector("#country");
	let atr = txtField.getAttribute("name");
	const httpRequest = new XMLHttpRequest();
	
	let search = function(){
		
		let newUrl = url+atr+"="+txtField.value;
		console.log("Clicked!: "+ newUrl);
		
		fetch(newUrl)
			.then(response=>{if(!response.ok){console.log(response.status);} return response.text()})
			.then(htmlContent=>{
					resultDiv.innerHTML =""; 
					resultDiv.append(htmlContent);
				}).catch(error=>{resultDiv.innerHTML ="";
								 resultDiv.innerHTML ='<p class="error"> Couldnt get data</p>';
								 console.log("fetch error");
								});	
	}
	
	btn.onclick = search;
	
	
});