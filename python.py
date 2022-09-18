from joblib import dump, load
import numpy as np

from sklearn.pipeline import Pipeline
from sklearn.impute import SimpleImputer


# print(model.predict(features))
class MyPrediction:
    def __init__(self,arr):
        self.arr=arr
    def myPredict(self):
        model = load('model/Student_bagging.joblib')
        # print(model.predict(self.arr))
        return model.predict(self.arr)

if __name__ == '__main__':
    import sys
    features=sys.argv[1]
    # features= "0,0,2,2,3,1,1,1,1,1,1,3,13,12,1,0,0,1,0,0,0,1,0,0,0,1,1,0,0,1,0,1,1,1,1,1,0,0"
    # print(features)
    # return type(features)
    # arr=[float(i) for i in features.split(",")]
    # emp=np.empty([1,30])
    # return features
    # for i in features.split(","):
    #     emp.ins
    # print(type(arr))
    # print(arr)
    # print(np.array(arr))
    # featur=np.array(arr)
    # print(featur)

    # features="17.,1.,1.,1.,2.,0.,4.,4.,3.,2.,4.,5.,4.,8.,9.,1.,1.,0.,1.,0.,1.,0.,0.,0.,1.,0.,0.,1.,0.,0.,1.,0.,0.,0.,1.,0.,1.,1.,0."
    arr=np.array([[float(i) for i in features.split(",")]])
   
    # my_pipeline = Pipeline([
    # ('imputer', SimpleImputer(strategy="median")),
    # ])
    my_pipeline = load('model/Student_bagging_pipeline.joblib')
    arr = my_pipeline.fit_transform(arr)
    # features = np.array([[-1.41099492,  1.32000749, -0.24213187, -0.76095355, -1.11872906,
    #     -0.37467434, -2.06589016, -1.1496273 ,  0.75091054,  0.53076974,
    #         1.35073676, -1.75718033, -0.79805831, -0.16642399, -0.22704479,
    #         1.1797055 ,  0.64955201, -0.64655455,  0.364949  ,  3.6092973 ,
    #     -0.80800139, -0.50060205, -0.37169597, -0.17835118, -1.14309521,
    #         1.55385768, -0.23426064, -0.5484085 ,  3.09706906, -0.52458009,
    #         0.640567  , -0.26476989, -0.35470192, -1.26293309, -0.23426064,
    #     -0.98660227,  0.35470192,  0.54246137, -0.75364171]])
    print(MyPrediction(arr).myPredict())