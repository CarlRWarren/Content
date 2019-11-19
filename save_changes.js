function Save(PageID) {
        var header = document.getElementById("Header");
        var content = document.getElementById("Content");

        var xhr;
        if(header.innerHTML != ""){
            xhr = new XMLHttpRequest();
            
            var data = "Header=" + header.innerHTML + "&Content=" + content.innerHTML + "&PageID=" + PageID;
            xhr.open("POST", "update_page.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
            
            if(header.classList.contains("header_error")){
                header.classList.remove("header_error");
            }
        }
        else {
            header.classList.add("header_error");
        }

    
    }