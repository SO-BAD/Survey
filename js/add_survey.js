function del(nu) {
    document.getElementById(nu).remove();
    if(nu =="q1") q_ct--;
}
var q_ct = 0;
var opt_ct = [1];
function add_o(num) {
    if (opt_ct[num] < 5) {
        opt_ct[num]++;
        let f = document.getElementsByClassName("o_box")[num];
        let str = 'o' + num + '-' + opt_ct[num];
        let str1 = "<div id = '" + str + "'  class='o'>";
        let str2 = "<i class='far fa-circle'></i><input type='text' class='opt' name='q[" + num + "][]' placeholder='Option'>";
        let str3 = "<i id = 'o" + num + "-" + opt_ct[num] + "a' class='fas fa-exclamation-triangle'></i><i class='fas fa-times'";
        let str4 = 'onclick ="' + "del('" + str + "')" + '"' + "'></i>";
        let d = document.createElement("div");
        d.innerHTML = str1 + str2 + str3 + str4;
        f.appendChild(d);
    } else {
        alert("最多五個Option");
    }
}

function add_q() {
    if (q_ct < 1) {
        q_ct++;
        opt_ct.push(0);
        
        let c = document.getElementsByClassName("ques")[0].cloneNode(true);
        c.setAttribute("id",("q"+q_ct));
        let x = document.createElement("i");
        x.setAttribute("class","fas fa-times");
        x.setAttribute("onclick",("del('q"+q_ct+"')"));
        x.style.float = "right";
        c.getElementsByClassName("q_t")[0].appendChild(x);
        
        c.getElementsByClassName("q_t_i")[0].setAttribute("name", ("q[" + q_ct + "][]"));
        c.getElementsByClassName("fa-plus")[0].setAttribute("onclick", ("add_o(" + q_ct + ")"));
        let o = c.getElementsByClassName("o_box")[0];
        while (o.firstChild) {
            o.removeChild(o.firstChild);
        }
        let f = document.getElementsByClassName("content")[0];
        f.appendChild(c);
    } else {
        alert("最多兩題");
    }
}