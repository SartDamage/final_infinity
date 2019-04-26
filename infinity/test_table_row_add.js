

    function addField (argument) {
        var myTable = document.getElementById("myTable");
        var currentIndex = myTable.rows.length;
        var currentRow = myTable.insertRow(-1);

        var linksBox = document.createElement("input");
        linksBox.setAttribute("name", "links" + currentIndex);

        var keywordsBox = document.createElement("input");
        keywordsBox.setAttribute("name", "keywords" + currentIndex);

        var violationsBox = document.createElement("input");
        violationsBox.setAttribute("name", "violationtype" + currentIndex);

        var addRowBox = document.createElement("input");
        addRowBox.setAttribute("type", "button");
        addRowBox.setAttribute("value", "Add another line");
        addRowBox.setAttribute("onclick", "addField();");
        addRowBox.setAttribute("class", "button");

        var currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(linksBox);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(keywordsBox);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(violationsBox);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(addRowBox);
    }