/*document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('filterFormAdmin').addEventListener('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        fetch('../PHP/admintable.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('filteredTable').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('filterFormUser').addEventListener('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        fetch('../php/tableMessages.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('filteredTable').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});*/

document.addEventListener("DOMContentLoaded", function () {
	var panelHeadings = document.querySelectorAll(".panel-heading");

	panelHeadings.forEach(function (panelHeading) {
		panelHeading.addEventListener("mouseenter", function () {
			var collapse = this.closest(".panel").querySelector(".collapse");
			if (collapse) {
				collapse.classList.add("show");
			}
		});

		panelHeading.addEventListener("mouseleave", function () {
			var collapse = this.closest(".panel").querySelector(".collapse");
			if (collapse) {
				collapse.classList.remove("show");
			}
		});
	});
});

document.addEventListener("DOMContentLoaded", function () {
	// Get the current page URL
	var currentURL = window.location.href;

	// Add 'active' class to the corresponding nav link
	var listItems = document.querySelectorAll(".list-item");
	listItems.forEach(function (item) {
		if (item.querySelector(".nav-link").href === currentURL) {
			item.classList.add("active");
		}
	});
});

document.addEventListener("DOMContentLoaded", function () {
	const menu = document.getElementById("menu-button");
	const sidebar = document.querySelector(".side-bar");

	function updateSidebarVisibility() {
		const screenWidth = window.innerWidth;
		const hideSidebarThreshold = 768;

		if (screenWidth < hideSidebarThreshold) {
			sidebar.classList.add("hide");
			sidebar.classList.remove("show");
		} else {
			sidebar.classList.remove("hide");
			sidebar.classList.remove("show");
		}
	}

	updateSidebarVisibility();

	menu.addEventListener("click", function () {
		const screenWidth = window.innerWidth;
		const hideSidebarThreshold = 768;

		if (screenWidth < hideSidebarThreshold) {
			if (sidebar.classList.contains("show")) {
				sidebar.classList.remove("show");
				sidebar.classList.add("hide");
			} else {
				sidebar.classList.add("show");
				sidebar.classList.remove("hide");
			}
		} else {
			sidebar.classList.toggle("hide");
		}
	});

	window.addEventListener("resize", function () {
		updateSidebarVisibility();
	});
});

document.addEventListener("DOMContentLoaded", function () {
	// Get today's date
	var today = new Date();

	// Options for formatting the date
	var options = {
		weekday: "long",
		year: "numeric",
		month: "long",
		day: "numeric",
		timeZone: "Asia/Jakarta", // Set the timezone to Jakarta
	};

	// Format the date using Jakarta's timezone and options
	var formattedDate = today.toLocaleDateString("id-ID", options);

	// Replace English day name with Bahasa Indonesia
	formattedDate = formattedDate
		.replace("Sunday", "Minggu")
		.replace("Monday", "Senin")
		.replace("Tuesday", "Selasa")
		.replace("Wednesday", "Rabu")
		.replace("Thursday", "Kamis")
		.replace("Friday", "Jumat")
		.replace("Saturday", "Sabtu");
	// Update the <h5> element with the formatted date
	document.getElementById("Date").textContent = formattedDate;
});
// initial call to set the time immediately

/*
function toggleEdit() {
    document.getElementById("editButton").style.display = "none";
    document.getElementById("saveButton").style.display = "block";

    // Enable editing for all input fields except the "ID" field
    var form = document.getElementById("profileForm");
    var inputs = form.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].id !== "id") {
            inputs[i].readOnly = false;
        }
    }
}

function saveChanges() {
    document.getElementById("saveButton").style.display = "none";
    document.getElementById("editButton").style.display = "block";

    // Disable editing for all input fields
    var form = document.getElementById("profileForm");
    var inputs = form.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].readOnly = true;
    }
}*/
