var data = new Date();
var dataFormatada = ("0" + data.getDate()).substr(-2) + "/" 
    + ("0" + (data.getMonth() + 1)).substr(-2) + "/" + data.getFullYear();

function getRandom(max) {
    return Math.floor(Math.random() * max + 1)
}
