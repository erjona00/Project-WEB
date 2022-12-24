var varguImazheve=[
    'essenceCosmetics.png',
    'maybellineNewYork.png',
    'mac.png',
    'sephora.jpg'
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

