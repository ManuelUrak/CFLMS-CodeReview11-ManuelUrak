

let id = $("input[name *= 'animalID']");
id.attr("readonly", "readonly");

$(".btnedit").click(e =>
{
	let textvalues = displayData(e);

	let animalname = $("input[name *= 'animal_name']");
	let zipcode = $("input[name *= 'zipcode']");
	let location = $("input[name *= 'location']");
	let animaltype = $("input[name *= 'animal_type']");
	let animalage = $("input[name *= 'animal_age']");
	let phonenumber = $("input[name *= 'phone_number']");
	let animalimage = $("input[name *= 'animal_image']");

	id.val(textvalues[0]);
	animalname.val(textvalues[1]);
	zipcode.val(textvalues[2]);
	location.val(textvalues[3]); 
	animaltype.val(textvalues[4]);
	animalage.val(textvalues[5]);  
	phonenumber.val(textvalues[6]);
	animalimage.val(textvalues[7]);
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