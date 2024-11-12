

    document.getElementById("passwordInput").addEventListener("input", function() { this.value = this.value.toUpperCase(); });
    document.getElementById("passwordInput").addEventListener("keypress", function(event) {
        var charCode = event.which || event.keyCode;
        var charTyped = String.fromCharCode(charCode);
        var pattern = /[a-zA-Z]/;
        if (!pattern.test(charTyped)) {
            event.preventDefault();
        }
    });
    document.getElementById("passwordInput").addEventListener("input", function() {
        if (this.value.length === 6) {
            displayMessage();
        }
    });

    function displayMessage() {
        var message = document.getElementById("message");
        var inputText = document.getElementById("passwordInput").value.toLowerCase();

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                if (response !== "invalid phrase") {
     handlePhrase(response);
                } else {
                    message.style.visibility = "visible";
                    message.style.animation = "none";
                    var err = new Audio("https://nez.fyi/sml-assets/wrong.ogg");
                    err.play();
                    setTimeout(function() {
                        message.style.animation = "fadeOut 3s ease forwards";
                    }, 100);
                }
            }
        };
        xhr.open("POST", "/laptop/terus-frontend/handleE.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("input=" + inputText);
    }

    function resetMessageAnimation() {
        var message = document.getElementById("message");
        message.style.animation = 'none';
        void message.offsetWidth;
        message.style.animation = null;
    }

    function handlePhrase(phrase) {
        var notice = document.querySelector(".downloadnotice");
        var start = new Audio("https://nez.fyi/sml-assets/pianos01.ogg");
        start.play();
        preload3dgameassets();
        notice.style.visibility = "visible";
        notice.style.transform = "translateY(-8px)";
        setTimeout(function() {
            var end = new Audio("https://nez.fyi/sml-assets/pianos02.ogg");
            end.play();
            notice.innerText = "🗈 - " + phrase;
            notice.onclick = function() {
                window.location.href = "/laptop/terus-frontend/cd/" + phrase + ".php";
            };
        }, 4230);
    }
    
var gameimagelist = ["aeth1.png", "aeth2.png", "aeth3.png", "aeth4.png", "trash2.png", "trash1.png", "carpet.jpeg", "creamwall.jpeg", "jimmy.png", "wood_floor.jpg", "roof.jpeg", "laptop-bottom.jpeg", "laptop-bottomside.jpeg", "laptop-top.jpeg", "laptop-side.jpeg", "mudcracked.jpeg", "meatlot.jpeg", "spread.jpeg", "skytest.jpeg", "paintflor.jpeg", "smogsclouds.png", "woodtexture1.jpg", "floorvirus.png", "scratches.png", "wallvirus.png", "trees.png", "house01.png", "house02.png", "house03.png", "house04.png", "house05.png", "cieling.jpeg", "carpet.jpeg", "trashguts.png", "trashguts2.png", "trashguts3.png", "wind_broke.png", "wind.png"];
    function preload3dgameassets() {
      for (var i = 0; i < gameimagelist.length; i++) { var img = new Image();
        img.src = "/laptop/terus-frontend/texture/" + gameimagelist[i];
    } }
    

