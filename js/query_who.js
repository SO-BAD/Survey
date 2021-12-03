function query_who(id,q_num,answer){
    document.getElementsByClassName("display_box")[0].style.display= "block";
    document.getElementsByClassName("display_res")[0].style.display= "block";
    $.post("./api/query_who.php", {
        id: id,
        q_num:q_num,
        answer:answer,
    },
    function(res){
        let new_res = res.replace(",","<br>")
        let res_content = document.getElementsByClassName("res_content")[0];
        res_content.innerHTML = new_res;
    }
);
}

function query_opt(obj){
    let opt = obj.getElementsByTagName("td")[0].innerText;
    let res_header = document.getElementsByClassName("res_header")[0];
    res_header.innerText = opt;
}