export class Category {
    title : string;
    text : string;
}

export class CategoryJson {
    public static fromJson(json: Object): CategoryJson {
        return new CategoryJson(
            json['@id'],
            json['title']
        );
    }

    constructor(public id: string,
                public title: string) {
    }
}