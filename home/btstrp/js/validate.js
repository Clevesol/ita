/*
(function() {
	document.onready = function() {
		var forms = document.getElementsByTagName('form');
		formArray = Array.prototype.slice.call(forms);
		
		formArray.forEach(function(item,index){
			formArray[index].addEventListener('submit',validateForm);
		});
	}
})();
*/


function validateForm(event) 
{
	var form = event.target;
	var valid_Email = false;
	if(form.uname)

	{
		valid_Email = isValidEmail(form.uname.value);
	}


	//console.log(form,form.uname,form.pword,form.pword2,form.pword3);
	if(form.pword)
	{

	}else{
		console.log(form.pword,form.pword2);
	}
	
	if(form.pword2 && form.pword3)
	{
		if(form.pword2.value == form.pword3.value)
		{
			return (valid_Email && isValidPassword(form.pword3.value));
		}else
			{
				alert('password do not match');
				return 	false;
			}	
	}

	form.submit();
	console.log('form suubmitted');
	
	
//	event.preventDefault();
//	var _Oform = event.target;
//	var inputs = Array.prototype.slice.call((_Oform.getElementsByTagName('input')));
//	var pArr;
//	inputs.forEach(function(item,index)
//					{
//						if(inputs[index].type == 'email')
//						{
//							if(isValidEmail(inputs[index].value) == false)
//							{
//								return false;
//							}
//						}else if(inputs[index].type == 'password')
//						{
//							pArr.push(inputs[index]);
//						}
//					}
//	);
//	
//	pArr.forEach(function(item,index)
//				 {
//					if(pArr[index].type == 'password')
//					{
//						
//					}
//				 }
//	);
	
}

function isValidPassword(value){
	console.log(value);
	var regex = new RegExp("/^[0-9],[1-4]$/");
	return regex.test(value);
}

function isValidEmail(value)
{
	if(value.indexOf('@') == 0 || value.indexOf('@') == -1)
	{
		return false;
	}else{
		alert('no prob atall');
	}
	return true;
}