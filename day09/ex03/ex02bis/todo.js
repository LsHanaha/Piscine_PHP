var temp = [];

window.onload = function() {
	if (document.cookie) {
		console.log(document.cookie);
		var list = JSON.parse(document.cookie);
		for (i in list) {
			add_node(list[i]);
		}
		temp = list;
	}
};

window.onunload = function() {
	document.cookie = JSON.stringify(temp);
	temp = [];
};

function del(result) {
	var ask = confirm("Are you want to delete this?");
	if (ask) {
		var index = temp.indexOf(this.innerHTML);
		if (index >= 0) {
			temp.splice(index, 1);
		}
		this.remove();
	}
}

function add_node(result) {
	$("#ft_list").prepend(
		$('<div class="task" >' + result + "</div>").click(del)
	);
	temp.push(result);
}

function create_node() {
	var task_str = prompt("Add task name:");
	var result = task_str.trim();
	if (result.length == 0) return;
	add_node(result);
}
