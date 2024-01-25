<!-- Cryptocurrency Price Widget -->
<script>
    !function(){
        var e=document.getElementsByTagName("script"),
            t=e[e.length-1],
            n=document.createElement("script");

        function r(){
            var e=crCryptocoinPriceWidget.init({
                base:"BRL",
                items:"BTC",
                backgroundColor:"FFFFFF",
                streaming:"1",
                striped:"1",
                rounded:"1",
                boxShadow:"1",
                border:"1"
            });

            t.parentNode.insertBefore(e,t)
        }

        n.src="https://co-in.io/pt/widget/pricelist.js?items=BTC";
        n.async=!0;

        if (n.readyState){
            n.onreadystatechange=function(){
                if ("loaded"!=n.readyState&&"complete"!=n.readyState){
                    return
                }

                n.onreadystatechange=null;
                r()
            }
        } else {
            n.onload=function(){
                r()
            }
        }

        t.parentNode.insertBefore(n,null)
    }();
</script>
<!-- /Cryptocurrency Price Widget -->
