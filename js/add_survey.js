var q_ct = 0;
var q_o_ct = 2;
function del(nu) {
    document.getElementById(nu).remove();
    q_o_ct--;
}
function add_o(num) {
    if(q_o_ct <5){
    q_o_ct++;
    let x = "q_o" + num + "-";
    let n = document.getElementById((x + "1")).cloneNode(true);
    n.setAttribute("id", (x + q_o_ct));
    let i = document.createElement("i");
    i.setAttribute("class", "fas fa-plus");
    i.setAttribute("onclick", ("del('" + x + q_o_ct + "');"));
    n.appendChild(i);
    let f = document.getElementsByClassName("q_o")[num];
    f.appendChild(n);
    }else{
        alert("最多5個選項");
    }
}


function add_q() {
    if (q_ct < 1) {
        q_ct++;
        let clone = document.getElementsByClassName("ques")[0].cloneNode();
        let html1 ="<div class='q_t'><span>Question: <input type='text' class='q_t_i'name='q[";
        let html2 ="][]'></span></div><div class='q_o'><div id='q_o"+q_ct+"-1' class='q_o"+q_ct+"-1'>option:<input type='text' name='q["+q_ct+"][]'></div><div id='q_o"+q_ct+"-2' class='q_o"+q_ct+"-2'>option:<input type='text' name='q["+q_ct+"][]'></div></div><div class='q_add'><i class='fas fa-plus' onclick='add_o("+q_ct+")' style='cursor: pointer; '>&ensp;option</i></div>";
        let f = document.getElementsByClassName("content")[0];
        f.appendChild(clone);
        clone.innerHTML = html1 + q_ct+html2;
    } else {
        alert("最多2題");
    }

}
