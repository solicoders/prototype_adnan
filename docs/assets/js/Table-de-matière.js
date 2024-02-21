// Table de matière
const tableDeMatier = document.getElementById('table-de-matière');
const h1AndH2Elements = document.querySelectorAll('h1, h2'); // Select both h1 and h2 elements

// Create a new unordered list element
const ul = document.createElement('ul');

h1AndH2Elements.forEach(function (element) {

    // Create a new list item element
    const li = document.createElement('li');
    const p = document.createElement('p');

    // Create a new anchor element, set its href attribute to the corresponding element's id, set its text content to the element's text content, and insert the new anchor into the list item
    const newAnchor = document.createElement('a');
    newAnchor.href = "#" + element.id;
    newAnchor.textContent = element.textContent;
    newAnchor.style.fontWeight = "bold"; // Adding bold font style
    // Append the anchor element to the list item

    if (element.tagName === 'H1') {
        li.appendChild(newAnchor);

    }

    if (element.tagName === 'H2') {
        li.appendChild(newAnchor);
        ul.aulpendChild(li);
        li.appendChild(ul);
    }
    // console.log(element)

    // Append the list item to the unordered list
    ul.appendChild(li);
});

// Insert the unordered list after the table-de-matier element
tableDeMatier.insertAdjacentElement('afterend', ul);

