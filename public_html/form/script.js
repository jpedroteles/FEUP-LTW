var products = ['ABCD', 'DEFG'];

window.addEventListener("load", loadDocument, true);

function loadDocument(){

//exercise 2
//window.alert("Hello world!");


/* //exercise 3
	var prod = document.getElementById("products");
	window.alert(prod.innerHTML);
*/

/* //exercise 4
	var prod = document.getElementById("products");
	var child = firstTagChild(prod);
	window.alert(child.innerHTML);
*/
	
/*	//exercise 5
	var prod = document.getElementById("products");
	var sibling = firstNamedChild(firstNamedChild(prod, "DIV"), "SELECT");
	window.alert(sibling.innerHTML);
*/

	//exercise 6 and 7
	var prod = document.getElementById("products");
	var selectTag = firstNamedChild(firstNamedChild(prod, "DIV"), "SELECT");
	loadProducts(selectTag);
	
	//8
	var testAdd = firstNamedChild(prod, "INPUT").addEventListener("click", addLine,true);

}

function firstTagChild(element){
	
	var child = element.firstChild;
	
	while(child.nodeType !=1 ){
		 child = child.nextSibling;		 
	}
	return child;
}

function firstNamedChild(element, tag){
	
	var sibling =element.firstChild;
	
	while(sibling != null && sibling.tagName != tag ){
		sibling=sibling.nextSibling	
	}	
	return sibling;
}

function loadProducts(element){
/*	//exercise 7
	for(p in products){
			var option= document.createElement("option");
			option.value=products[p];
			option.text= products[p];
			element.appendChild(option);		
	}
*/
	var request = new XMLHttpRequest();
	
	request.addEventListener("load", productsLoaded, false);
	request.open("get","products.php", true);
	request.send();
}

function productsLoaded(){
	var form = document.getElementById("products");
	var line =firstTagChild(form);
	var select = firstNamedChild(line, "SELECT");
	var products =JSON.parse(this.responseText);
	
	for(p in products){
			var option= document.createElement("option");
			option.value=products[p];
			option.text= products[p];
			element.appendChild(option);		
	}
	
	savedLine=line.cloneNode(true);
}


function addLine(form){
	var form = document.getElementById("products");
	var add = firstNamedChild(form ,"INPUT");
	form.insertBefore(savedLine.cloneNode(true), add);
	
}