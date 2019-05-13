var obj = document.getElementById("ft_list");

window.onload = function() {
	if (document.cookie) {
		console.log(document.cookie);
		var list = JSON.parse(document.cookie);
		for (i in list) {
			add_node(list[i]);
		}
	}
};

window.onunload = function() {
	var temp = [];
	for (i = 0; i < obj.children.length; i++) {
		temp.unshift(obj.children[i].innerText);
	}
	document.cookie = JSON.stringify(temp);
};

function add_node(result) {
	var div = document.createElement("div");
	div.className = "task";
	div.innerHTML = result;
	div.onclick = function() {
		ask = confirm("Are you want to delete " + result + "?");
		if (ask) this.parentElement.removeChild(this);
	};
	obj.insertBefore(div, obj.firstChild);
}

function create_node() {
	var task_str = prompt("Add task name:");
	var result = task_str.trim();
	if (result.length == 0) return;
	add_node(result);
}
