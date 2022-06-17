export default class Location {
    static async getCoords() {
        return new Promise((resolve, reject) => {
            if (!("geolocation" in navigator)) {
                reject(new Error('Geolocation is not available.'));
            }
            navigator.geolocation.getCurrentPosition(pos => {
                const latitude = pos.coords.latitude;
                const longitude = pos.coords.longitude;
                resolve({ latitude, longitude });
            }, err => {
                reject(err);
                console.log('Can\'t get your position')
            });
        });
    }
}