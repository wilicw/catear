const get = (name, p) => document.getElementById(p + "-" + name).value;

const insrn = p => Boolean((get('taipei', p) == '1')||(get('live', p) == '1'));

const post = p => {
    
    let res = validate(p);
    
    if (res) {
        
        $.post('server.php', res, ()=>{}).then(()=>{
            M.toast({html:"報名成功！", });
            clear();
        }).catch(() => {
            M.toast({html:"報名失敗！傳送資料至資料庫時發生錯誤"});
        });
        
    } else {
        M.toast({html:"報名失敗！未填寫部分內容或格式錯誤"});
    }
    
}

const validate = p => {
    
    let Result = new Object;
    
    let args = [
        [ "name", "wild" ], [ "nick", "wild" ],
        [ "tel", "strict", /^09[0-9]{8}$/ ],
        [ "mail", "strict", /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/ ],
        [ "school", "wild" ], [ "grade", "wild" ], [ "club", "wild" ],
        [ "emrg", "wild" ], [ "emrgTel", "strict", /^09[0-9]{8}$/ ],
        [ "gather", "wild" ], [ "food", "wild" ], [ "live", "wild" ],
        [ "night", "wild" ], [ "taipei", "wild" ]
    ]
    
    for (i=0;i<14;i++) {
        
        let Me = args[i];
        
        console.log(Me);
        
        console.log(get(Me[0], p));
        
        switch (Me[1]) {
            case "wild":
                if (get(Me[0], p)) {
                    console.log("build with " + Me[0]);
                    Result[Me[0]] = get(Me[0], p);
                } else {
                    return false;
                }
            break;
            case "strict":
                if (get(Me[0], p) && Me[2].test(get(Me[0], p)) ) {
                    console.log("build with " + Me[0]);
                    Result[Me[0]] = get(Me[0], p);
                } else {
                    return false;
                }
            break;
        }
        
        console.log(Result);
        
    }
    
    console.log("finished 1st");
    
    console.log(insrn(p));
    
    if (insrn(p)) {
        
        let reg = /^[a-zA-Z]\d{9}$/;
        
        if (get("id", p) && reg.test(get("id", p))) {
            Result.id = get("id", p);
        } else { return false; }
        
        if (get("bday", p)) {
            Result.bday = get("bday", p);
        } else { return false; }
        
    } else {
        Result.id = "null";
        Result.bday = "null";
    }
    
    Result.comment = get("comment", p) ? get("comment", p) : "null";
    
    console.log("successfully validated");
    
    console.log(Result);
    
    return Result;
    
}

const tog = p => {
    if (insrn(p)) {
        $("#" + p + "-insrn").show();
    } else {
        $("#" + p + "-insrn").hide();
    }
}

const clear = () => {
    $('#d-form').html(dFormInner);
    $('#m-form').html(mFormInner);
    $(function() {
            $('select').formSelect();
            $('.datepicker').datepicker({
                yearRange: 20,
                i18n: {
                    months: [
                        '１月',
                        '２月',
                        '３月',
                        '４月',
                        '５月',
                        '６月',
                        '７月',
                        '８月',
                        '９月',
                        '１０月',
                        '１１月',
                        '１２月'
                    ],
                    monthsShort: [
                        '1月',
                        '2月',
                        '3月',
                        '4月',
                        '5月',
                        '6月',
                        '7月',
                        '8月',
                        '9月',
                        '10月',
                        '11月',
                        '12月'
                    ],
                    weekdays: [
                        '星期日',
                        '星期一',
                        '星期二',
                        '星期三',
                        '星期四',
                        '星期五',
                        '星期六'
                    ],
                    weekdaysShort: [
                        '(日)',
                        '(一)',
                        '(二)',
                        '(三)',
                        '(四)',
                        '(五)',
                        '(六)'
                    ],
                    cancel: '取消',
                    done: '確認'
                }
            });
            $("#d-insrn").hide();
            $("#m-insrn").hide();
        });
}

const dFormInner = `<div class="card-content black-text">

                    <span class="card-title">報名茶會</span>
                    <div class="divider"></div><br>
                    <div class="row">

                            <div class="input-field col s6">
                                <input id="d-name" type="text" class="validate">
                                <label for="d-name">姓名</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="d-nick" type="text" class="validate">
                                <label for="d-nick">綽號</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="d-tel" type="tel" class="validate" pattern="09[0-9]{8}">
                                <label for="d-tel">電話號碼</label>
                                <span class="helper-text" data-error="格式錯誤"></span>
                            </div>

                            <div class="input-field col s6">
                                <input id="d-mail" type="text" class="validate" pattern="[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+">
                                <label for="d-mail">電子郵件</label>
                                <span class="helper-text" data-error="格式錯誤"></span>
                            </div>

                            <div class="input-field col s4">
                                <input id="d-school" type="text" class="validate">
                                <label for="d-school">學校</label>
                            </div>

                            <div class="input-field col s4">
                                <select id="d-grade">
                                <option value="" disabled selected>請選擇屆數</option>
                                <option value="百七以上">百七以上</option>
                                <option value="百八">百八</option>
                                <option value="百九">百九</option>
                            </select>
                                <label>屆數</label>
                            </div>


                            <div class="input-field col s4">
                                <input id="d-club" type="text" class="validate">
                                <label for="d-club">社團</label>
                                <span class="helper-text">請輸入全名</span>
                            </div>
                            <div class="input-field col s6">
                                <input id="d-emrg" type="text" class="validate">
                                <label for="d-emrg">緊急聯絡人姓名</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="d-emrgTel" type="tel" class="validate" pattern="09[0-9]{8}">
                                <label for="d-emrgTel">緊急聯絡人電話</label>
                                <span class="helper-text" data-error="格式錯誤"></span>
                            </div>

                            <div class="input-field col s4">
                                <select id="d-gather">
                                <option value="" disabled selected>請選擇集合地點</option>
                                <option value="1">台北車站M1出口 12:00 ~ 12:30</option>
                                <option value="2">捷運市府站1號出口 12:15 ~ 12:45</option>
                                <option value="3">松山高中正門口 12:40 ~ 12:55</option>
                            </select>
                                <label>集合地點</label>
                            </div>

                            <div class="input-field col s4">
                                <select id="d-food">
                                <option value="" disabled selected>請選擇食物</option>
                                <option value="葷食">葷食</option>
                                <option value="素食">素食</option>
                                <option value="不需要">不需要</option>
                            </select>
                                <label>食物</label>
                                <span class="helper-text">費用： 80元</span>
                            </div>

                            <div class="input-field col s4">
                                <select id="d-live" onchange="tog('d')">
                                <option value="" disabled selected>請選擇是否住宿</option>
                                <option value="1">是</option>
                                <option value="0">否</option>
                            </select>
                                <label>住宿</label>
                                <span class="helper-text">住宿+保險費共500元／需交<a href="consent.pdf" target="blank">家長同意書</a></span>
                            </div>

                            <div class="input-field col s6">
                                <select id="d-night">
                                <option value="" disabled selected>請選擇是否參加夜遊</option>
                                <option value="1">參加</option>
                                <option value="0">不參加</option>
                            </select>
                                <label>夜遊</label>
                            </div>

                            <div class="input-field col s6">
                                <select id="d-taipei" onchange="tog('d')">
                                <option value="" disabled selected>請選擇是否參加臺北遊</option>
                                <option value="1">參加</option>
                                <option value="0">不參加</option>
                            </select>
                                <label>臺北遊</label>
                            </div>

                            <div id="d-insrn" style="width: 100%">

                                <div class="input-field col s6">
                                    <input id="d-id" type="text" class="validate" pattern="[a-zA-Z]\d{9}">
                                    <label for="d-id">身分證字號</label>
                                    <span class="helper-text" data-error="格式錯誤">保險用，費用100元</span>
                                </div>

                                <div class="input-field col s6">
                                    <input id="d-bday" type="text" class="datepicker">
                                    <label for="d-bday">生日</label>
                                    <span class="helper-text" data-error="格式錯誤">保險用，費用100元</span>
                                </div>

                            </div>

                            <div class="input-field col s6">
                                <textarea id="d-comment" class="materialize-textarea"></textarea>
                                <label for="d-comment">備註</label>
                            </div>

                            <div class="col s12" style="margin-bottom: 12vh"></div>

                    </div>
                </div>
                <div class="card-action">
                    <a href="#" class=""> </a>
                    <a href="#" class="right" onclick="post('d')">提交</a>
                </div>
`, mFormInner = `<div class="card-content ">
                    <span class="card-title">&nbsp;報名茶會</span>
                    <div class="divider"></div><br>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="m-name" type="text" class="validate">
                            <label for="m-name">姓名</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="m-nick" type="text" class="validate">
                            <label for="m-nick">綽號</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="m-tel" type="tel" class="validate" pattern="09[0-9]{8}">
                            <label for="m-tel">電話號碼</label>
                            <span class="helper-text" data-error="格式錯誤"></span>
                        </div>

                        <div class="input-field col s12">
                            <input id="m-mail" type="text" class="validate" pattern="[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+">
                            <label for="m-mail">電子郵件</label>
                            <span class="helper-text" data-error="格式錯誤"></span>
                        </div>

                        <div class="input-field col s12">
                            <input id="m-school" type="text" class="validate">
                            <label for="m-school">學校</label>
                        </div>

                        <div class="input-field col s12">
                            <select id="m-grade">
                                <option value="" disabled selected>請選擇屆數</option>
                                <option value="百七以上">百七以上</option>
                                <option value="百八">百八</option>
                                <option value="百九">百九</option>
                            </select>
                            <label>屆數</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="m-club" type="text" class="validate">
                            <label for="m-club">社團</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="m-emrg" type="text" class="validate">
                            <label for="m-emrg">緊急聯絡人姓名</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="m-emrgTel" type="tel" class="validate" pattern="09[0-9]{8}">
                            <label for="m-emrgTel">緊急聯絡人電話</label>
                            <span class="helper-text" data-error="格式錯誤"></span>
                        </div>

                        <div class="input-field col s12">
                            <select id="m-gather">
                                <option value="" disabled selected>請選擇集合地點</option>
                                <option value="1">台北車站M1出口 12:00 ~ 12:30</option>
                                <option value="2">捷運市府站1號出口 12:15 ~ 12:45</option>
                                <option value="3">松山高中正門口 12:40 ~ 12:55</option>
                            </select>
                            <label>集合地點</label>
                        </div>

                        <div class="input-field col s12">
                            <select id="m-food">
                                <option value="" disabled selected>請選擇食物</option>
                                <option value="葷食">葷食</option>
                                <option value="素食">素食</option>
                                <option value="不需要">不需要</option>
                            </select>
                            <label>食物</label>
                            <span class="helper-text">費用： 80元</span>
                        </div>

                        <div class="input-field col s12">
                            <select id="m-live" onchange="tog('m')">
                                <option value="" disabled selected>請選擇是否住宿</option>
                                <option value="1">是</option>
                                <option value="0">否</option>
                            </select>
                            <label>住宿</label>
                            <span class="helper-text">住宿+保險費共500元／需交<a href="consent.pdf" target="blank">家長同意書</a></span>
                        </div>

                        <div class="input-field col s12">
                            <select id="m-night">
                                <option value="" disabled selected>請選擇是否參加夜遊</option>
                                <option value="1">參加</option>
                                <option value="0">不參加</option>
                            </select>
                            <label>夜遊</label>
                        </div>

                        <div class="input-field col s12">
                            <select id="m-taipei" onchange="tog('m')">
                                <option value="" disabled selected>請選擇是否參加臺北遊</option>
                                <option value="1">參加</option>
                                <option value="0">不參加</option>
                            </select>
                            <label>臺北遊</label>
                        </div>

                        <div id="m-insrn" style="width:100%">

                            <div class="input-field col s12">
                                <input id="m-id" type="text" class="validate" pattern="[a-zA-Z]\d{9}">
                                <label for="m-id">身分證字號</label>
                                <span class="helper-text" data-error="格式錯誤">保險用，費用100元</span>
                            </div>

                            <div class="input-field col s12">
                                <input id="m-bday" type="text" class="datepicker">
                                <label for="m-bday">生日</label>
                                <span class="helper-text" data-error="格式錯誤">保險用，費用100元</span>
                            </div>
                            <div class="col s12" style="padding-bottom: 12vh"></div>
                        </div>

                        <div class="input-field col s12">
                            <textarea id="m-comment" class="materialize-textarea"></textarea>
                            <label for="m-comment">備註</label>
                        </div>

                    </div>
                </div>
                <div class="card-action">
                    <a href="#" class=""> </a>
                    <a href="#" class="right" onclick="post('m')">提交</a>
                </div>
`;