export default class DisplayName {

    static Simple(object) {
        return object ? object.name : '';
    }

    static WithDash(object) {
        return object ? object.name + ' - ' : ''
    }

}