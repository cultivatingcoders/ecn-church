app.controller("SignUpController", function($http, SignupService, $scope, $window) {
$scope.membersId = null;
$scope.statusClass = "alert-success";
$scope.statusMessage = null;


/**
*method that controls the action table and will fill the table or display errors
*/
$scope.addMembersId = function(membersId) {
if(membersId.password === membersId.passwordConfirm) {
SignupService.addMembersId(membersId)
.then(function(reply) {
if(reply.status === 200) {
$window.location.href = "../../../adminPanel.php";
} else {
$scope.statusClass = "alert-danger";
$scope.statusMessage = reply.message;
}
});
}
}});
