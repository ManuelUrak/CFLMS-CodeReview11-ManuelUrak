

let userid = $("input[name *= 'userID']");
userid.attr("readonly", "readonly");

$(".btnedit").click(e =>
{
	let textvalues = displayData(e);

	let firstname = $("input[name *= 'firstName']");
	let lastname = $("input[name *= 'lastName']");
	let nickname = $("input[name *= 'nickname']");
	let email = $("input[name *= 'email']");
	let password = $("input[name *= 'password']");
	let status = $("input[name *= 'status']");

	userid.val(textvalues[0]);
	firstname.val(textvalues[1]);
	lastname.val(textvalues[2]);
	nickname.val(textvalues[3]); 
	email.val(textvalues[4]);
	password.val(textvalues[5]);  
	status.val(textvalues[6]);
});

function displayData(e)
{
	let id = 0;
	const td = $("#tbody tr td");
	let textvalues = [];

	for(const value of td)
	{
		if(value.dataset.id == e.target.dataset.id)
		{
			textvalues[id++] = value.textContent;
		}
	}

	return textvalues;
}