var varguImazheve=[
    '../images/essence.png',
    '../images/maybellineNewYork.png',
    '../images/mac.png',
    '../images/sephora.jpg'
];

var index = 0;
const koha = 1500;

function krijoSlider(){
    document.getElementById('slider').src = varguImazheve[index];
    index++;

    if(index == varguImazheve.length){
        index = 0;
    }
    setTimeout('krijoSlider()', koha);
}
krijoSlider();

