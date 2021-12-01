function del(nu) {
    document.getElementById(nu).remove();
}
var q_ct = 0;
var opt_ct = [1];
function add_o(num) {
    opt_ct[num]++;
    let f = document.getElementsByClassName("o_box")[num];
    let str = 'o' + num + '-' + opt_ct[num];
    let str1 = "<div id = '" + str + "'  class='o'>";
    let str2 = "<i class='far fa-circle'></i><input type='text' class='opt' name='q[0][]' placeholder='Option'>";
    let str3 = "<i id = 'o" + num + "-" + opt_ct[num] + "a' class='fas fa-exclamation-triangle'></i><i class='fas fa-times'";
    let str4 = 'onclick ="' + "del('" + str + "')" + '"' + "'></i>";
    let d = document.createElement("div");
    d.innerHTML = str1 + str2 + str3 + str4;
    f.appendChild(d);
}

function add_q(){
    q_ct++;
    opt_ct.push(1);
    let f = document.getElementsByClassName("content")[0];
    let c = document.getElementsByClassName("ques")[0].cloneNode(true);
    c.getElementsByClassName("q_t_i")[0].setAttribute("name",("q["+q_ct+"][]"));
    c.getElementsByClassName("fa-plus")[0].setAttribute("onclick",("add_o("+q_ct+")"));
    f.appendChild(c);
}