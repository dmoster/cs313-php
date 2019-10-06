function updateCart() {
  var itemString = JSON.stringify(itemsInCart);
  var sessionCaller = document.getElementById('session-caller');

  sessionCaller.innerHTML = '<\?php $_SESSION["itemsInCart"] = "' + itemString + '"; \?>';
}


function addToCartList(itemNum) {
  var name = document.getElementById('item' + itemNum + 'name').innerHTML;
  var description = document.getElementById('item' + itemNum + 'description').innerHTML;
  var cost = document.getElementById('item' + itemNum + 'cost').innerHTML;
  var image = document.getElementById('item' + itemNum + 'img').src;
  
  itemsInCart.push(new Item(name, description, cost, image));

  itemCounter.style.display = 'inline-block';
  itemCounter.innerHTML = itemsInCart.length;

  updateCart();
}


class Item {
  constructor(name, description, cost, image) {
    this.name = name;
    this.description = description;
    this.cost = cost;
    this.image = image;
  }
}


var itemsInCart = new Array();
var itemCounter = document.getElementById('item-counter');
