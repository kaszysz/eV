export default class CategoryList {


    constructor(list) {
        this.list = list
        this.categoryTree = []
        this.recursiveCounter = 0
        this.FlatDataTree(this.CreateDataTree())
    }

    CreateDataTree() {
        const hashTable = Object.create(null);
        this.list.forEach(
            (aData) => (hashTable[aData.id] = {...aData, childNodes: [] })
        );
        const dataTree = [];
        this.list.forEach((aData) => {
            if (aData.parent_id)
                hashTable[aData.parent_id].childNodes.push(hashTable[aData.id]);
            else dataTree.push(hashTable[aData.id]);
        });
        return dataTree;
    }

    DisplayIndentation(indentationNumber) {
        let space = "\xa0";
        let line = "--";
        let indentation = "";
        if (indentationNumber > 0) {
            indentation = line.repeat(indentationNumber) + space;
        }
        return indentation;
    }

    FlatDataTree(dataTree) {

        let indentation = this.DisplayIndentation(this.recursiveCounter)

        dataTree.forEach((aData) => {
            if (aData.childNodes.length > 0) {
                this.categoryTree.push({ id: aData.id, name: indentation + this.IsTrashed(aData) });
                this.recursiveCounter++;
                return this.FlatDataTree(aData.childNodes);
            } else {
                this.categoryTree.push({ id: aData.id, name: indentation + this.IsTrashed(aData) });
                this.arrayEnd++
            }

        });

        this.recursiveCounter--;
    }

    IsTrashed(item) {
        return item.deleted_at ? item.name + ' (deleted)' : item.name;
    }

    Show() {
        return this.categoryTree
    }
}