import AdminDog from "@/adminDog";
(function() {
    this.CreateAdminDog = function(config) {
        return new AdminDog(config);
    };
}.call(window));
