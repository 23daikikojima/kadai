$(function() {
        //1.ミルクココアインスタンスを作成
        var milkcocoa = new MilkCocoa("teaifc7ays7.mlkcca.com");

        //2."message"データストアを作成
        var ds = milkcocoa.dataStore("message");
        var dn = milkcocoa.dataStore("name");

        //3."message"データストアからメッセージを取ってくる
        ds.stream().sort("desc").next(function(err, datas) {
            datas.forEach(function(data) {
                renderMessage(data);
            });
        });

        //4."message"データストアのプッシュイベントを監視
        ds.on("push", function(e) {
            renderMessage(e);
        });

        $('#post').click(function () {
            post();
        });

        $('#content').keydown(function (e) {
            if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
            return false;
        } else {
            return true;
        }
        });

        $("#name").keydown(function (e) {
            if (e.which == 13){
                post();
                return false;
            }
        });
        $('#delete').on('click', function(){
            deleteAllMessages();
        });

        var last_message = "dummy";

        function renderMessage(message) {
            var message_html = '<p class="post-text">' + escapeHTML(message.value.content) + '</p>';
            var name_html = '<p class="post-text">' + escapeHTML(message.value.name) + '</p>';
            var date_html = '';
            if(message.value.date) {
                date_html = '<p class="post-date">'+escapeHTML( new Date(message.value.date).toLocaleString())+'</p>';
            }
            $("#"+last_message).before('<div id="'+message.id+'" class="post">'+message_html + name_html + date_html +'</div>');
            last_message = message.id;
        }

        function post() {
            //5."message"データストアにメッセージをプッシュする
            var content = escapeHTML($("#content").val());
            var name = escapeHTML($("#name").val());
            if (content && content !== "") {
                ds.push({
                    title: "タイトル",
                    content: content,
                    name: name,
                    date: new Date().getTime()
                }, function (e) {});
            }
            $("#content").val("");
            $("#name").val("");
        }

    function deleteMessage(dataStore, id) {
    var result;
    ds.remove(
      id,
      function(err, data){
        if (err != null) {
          console.log(err);
          result = false;
        }
        result = true;
      },
      function(err){
        result = false;
      }
    );
    if (result) {
      $('#'+id).remove();
      last_message = $(".post:first").attr('id');
    }
    return result;
  }
  function deleteAllMessages(dataStore) {
    while (last_message) {
      deleteMessage(dataStore, last_message);
    }
  }
    //インジェクション対策
    function escapeHTML(val) {
        return $('<div>').text(val).html();
    };
});

