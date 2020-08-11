var x = 2, y = 3, z = 4;
function mayora(Limite){
    if(x >= Limite){
        x = 0;
    }
    else if(x == 0){
        x = Limite;
    }

    if (y >= Limite){
        y = 0;
    }
    else if(y <= 0){
        y = Limite;
    }
    if(z >= Limite){
        z = 0;
    }
    else if(z <= 0){
        z = Limite;
    }
}
function aumentar(){
    x++; y++; z++;
}
function disminuir(){
    x--; y--; z--;
}
function direccioncentral(Dir){
    return Dir + y + '.png';
}
function direccionizq(Dir){
    return Dir + x + '.png';
}
function direccionder(Dir){
    return Dir + z + '.png';
}
function carrsuelizq(e1,e2,e3,d){
    disminuir();
    mayora(6)
    e1.src=direccionizq(d);
    e2.src=direccioncentral(d);
    e3.src=direccionder(d);
}
function carruselder(e1,e2,e3,d){
    mayora(6);
    aumentar();
    e1.src=direccionizq(d);
    e2.src=direccioncentral(d);
    e3.src=direccionder(d);
}