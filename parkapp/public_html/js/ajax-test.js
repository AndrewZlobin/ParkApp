// for (let i = 1; i < document.forms.length; i++){
//     // console.log(document.getElementById('changeParkingInfo'+i));
//     let parkingName = (document.getElementById('parkingName'+i).value);
//     let parkingCoordinates = (document.getElementById('parkingCoordinates'+i).value);
//     let parkingURL = (document.getElementById('parkingURL'+i).value);
//     let parkingDescription = (document.getElementById('parkingDescription'+i).value);
//     let parkingSystem = (document.getElementById('parkingSystem'+i).value);
//     let parkingCity = (document.getElementById('parkingCity'+i).value);
//     // console.log(parkingName);
//     let dataString = 'parkingName='+ parkingName +
//         '&parkingCoordinates=' + parkingCoordinates +
//         '&parkingURL=' + parkingURL +
//         '&parkingDescription=' + parkingDescription +
//         '&parkingSystem=' + parkingSystem +
//         '&parkingCity=' + parkingCity;
//     // console.log(dataString);
//     $.ajax({
//         type: "POST",
//         url: "/parkings/update",
//         data: dataString,
//         cache: false,
//         success: function(response, textStatus, jqXHR) {
//             $("#info").html('Submitted successfully');
//         }
//     });
// }
// for (let i = 1; i < document.forms.length; i++) {
    $(function () {
        $('changeOfficeInfo1').bind('submit', function (event) {
            event.preventDefault();// using this page stop being refreshing

            $.ajax({
                type: 'POST',
                url: '/parkings/updateobj',
                data: $('changeOfficeInfo1').serialize(),
                cache: false,
                success: function (response) {
                    alert (response);
                }
            });

        });
    });
// }