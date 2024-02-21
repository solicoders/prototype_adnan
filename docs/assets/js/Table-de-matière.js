//  Table de matière
const tableDeMatier = document.getElementById('table-de-matière');
const h1Elements = document.querySelectorAll('h1');

// Create a new unordered list element
const ul = document.createElement('ul');

h1Elements.forEach(function (h1) {
    // Create a new list item element
    const li = document.createElement('li');

    // Create a new anchor element, set its href attribute to the corresponding h1's id, set its text content to the h1's text content, and insert the new anchor into the list item
    const newAnchor = document.createElement('a');
    newAnchor.href = "#" + h1.id;
    newAnchor.textContent = h1.textContent;
    newAnchor.style.fontWeight = "bold"; // Adding bold font style

    // Append the anchor element to the list item
    li.appendChild(newAnchor);

    // Append the list item to the unordered list
    ul.appendChild(li);
});

// Insert the unordered list after the table-de-matier element
tableDeMatier.insertAdjacentElement('afterend', ul);