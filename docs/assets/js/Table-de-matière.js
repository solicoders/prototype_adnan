// Table de matière
const tableDeMatiere = document.getElementById('table-de-matière'); // Corrected variable name
const h1AndH2Elements = document.querySelectorAll('h1, h2'); // Select both h1 and h2 elements

// Create a new unordered list element
const ul = document.createElement('ul');

h1AndH2Elements.forEach(function (element) {

    // Create a new list item element
    const li = document.createElement('li');

    // Create a new anchor element, set its href attribute to the corresponding element's id, set its text content to the element's text content, and insert the new anchor into the list item
    const newAnchor = document.createElement('a');
    newAnchor.href = "#" + element.id;
    newAnchor.textContent = element.textContent;
    newAnchor.style.fontWeight = "bold"; // Adding bold font style

    // Append the anchor element to the list item
    li.appendChild(newAnchor);

    if (element.tagName === 'H2') {
        // Create a new unordered list element
        const innerUl = document.createElement('ul');

        // Append the list item to the inner unordered list
        innerUl.appendChild(li);

        // Append the inner unordered list to the outer unordered list
        ul.appendChild(innerUl);
    } else {
        // Append the list item to the unordered list
        ul.appendChild(li);
    }

});

// Insert the unordered list after the table-de-matiere element
tableDeMatiere.insertAdjacentElement('afterend', ul);
