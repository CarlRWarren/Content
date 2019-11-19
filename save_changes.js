function Save() {
        var hinput = document.getElementById("HeaderInput");
        var cinput = document.getElementById("ContentInput");
        var header = document.getElementById("Header");
        var content = document.getElementById("Content");

        hinput.setAttribute("value", header.innerHTML);
        cinput.setAttribute("value", content.innerHTML);

        
        var xhr;
        if(window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
            
            var data = "Header=" + header.innerHTML + "&Content=" + content.innerHTML;
            xhr.open("POST", "update_page.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
        }

    
    }